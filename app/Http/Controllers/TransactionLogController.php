<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Deposit;
use App\Models\Withdrawal;
use App\Models\TransactionHistory;
use Illuminate\Support\Facades\Auth;

class  TransactionLogController extends Controller
{
  public function index()
  {
    $transactions = TransactionHistory::where('user_id', Auth::user()->id)->latest()->paginate(10);
    return view('user.transactions', compact('transactions'));
  }
  public function depositlog()
  {
    $dLog = Deposit::where('status', '!=', 'completed')->latest()->paginate();
    return view('admin.depositlog')->with('deposits', $dLog);
  }

  public function confirm($id)
  {
      $deposit = Deposit::find($id);
      // $percent = $deposit->package->percentage;
      $duration = $deposit->package->duration;
      $amount = $deposit->amount;
      $status = $deposit->status;
      $id = $deposit->user_id;

      // Find user by ID
      $userWalletBal = User::find($id);
      $amount = floatval(preg_replace("/[^0-9.]/", "", $amount));
      // $bal = floatval(preg_replace("/[^0-9.]/", "", $userWalletBal->hashing_fee));

      // Deposit status is reinvest, minus from wallet balance
      if ($status == 'Reinvest pending') {
          $userWalletBal->profit = 0;
          $userWalletBal->totalProfitEarned = 0;
          $userWalletBal->investmentDuration = 0;
          $userWalletBal->hashing_fee = 0;
          $userWalletBal->save();
      }

      // Calculate daily profit
      // $profit = (floatval($percent) / 100) * floatval($amount);

      $update = User::find($id);
      $update->wallet_balance = $amount + floatval(preg_replace("/[^0-9.]/", "", $update->wallet_balance));
      $update->hashing_fee = $amount + floatval(preg_replace("/[^0-9.]/", "", $update->hashing_fee));
      $update->investmentDuration = $duration;
      $update->package = $deposit->package->name;
      $update->package_id = $deposit->package_id;
      $update->save();

      // Create transaction history
      $type = $status == 'deposit' ? 'deposit' : 'reinvest';
      TransactionHistory::create([
          'user_id' => $id,
          'type' => $type,
          'description' => "Your deposit of $\{$deposit->amount} was successful!",
          'amount' => $amount,
          'status' => 'completed',
      ]);

      $deposit->status = 'completed';
      $deposit->save();

      $msg = 'You\'ve just confirmed the sum of '.$deposit->amount.' to be credited to '.$update->name.'.';
      mail('admin@projectwhales.com', 'Transaction confirmation', $msg);

      return redirect()->back()->with('success', 'Confirmed!');
  }

    public function cancelDeposit($id)
    {
        $cancel = Deposit::findOrFail($id);
        $cancel->status = 'failed';
        $cancel->save();

        // Create transaction history
        TransactionHistory::create([
            'user_id' => $cancel->user_id,
            'type' => 'deposit',
            'description' => "Your deposit of {$cancel->amount} was not successful!",
            'amount' => preg_replace("/[^0-9.]/", "", $cancel->amount),
            'status' => 'failed',
        ]);

        return redirect()->back()->with('success', 'Deposit request has been mark as a failed transaction!');
    }

    public function withdrawalog()
    {
        $withdrawalRequest = Withdrawal::where('status', 'pending')->latest()->paginate(10);
        return view('admin.withdrawalog')->with('withdrawalogs', $withdrawalRequest);
    }

    public function confrimWithdrawal($id)
    {
        $wt = withdrawal::find($id);
        $from = $wt->withdraw_from;
        $amount = floatval(preg_replace("/[^0-9.]/", "", $wt->amount));
        $id = $wt->user_id;
        $update = User::find($id);
        $fromValue = floatval(preg_replace("/[^0-9.]/", "", $update->$from));

        // Minus from wallet balance
        $update->$from = $fromValue - $amount;
        $update->save();

        $wt->status = 'completed';
        $wt->save();

        // Create transaction history
        TransactionHistory::create([
            'user_id' => $id,
            'type' => 'withdraw',
            'description' => "Your withdrawal request of {$amount} was successful!",
            'amount' => $amount,
            'status' => 'completed',
        ]);

        $msg = 'You\'ve just confirmed the sum of '.$amount.' to be withdraw by '.$update->name.'.';
        mail('admin@projectwhales.com', 'Transaction confirmation', $msg);

        return redirect()->back()->with('success', 'Confirmed!');
    }

    public function cancelWithdrawal($id)
    {
        $cancel = Withdrawal::findOrFail($id);
        $cancel->status = 'canceled';
        $cancel->save();

        // Create transaction history
        TransactionHistory::create([
            'user_id' => $id,
            'type' => 'withdraw',
            'description' => "Your withdrawal request of {$cancel->amount} was not successful!",
            'amount' => preg_replace("/[^0-9.]/", "", $cancel->amount),
            'status' => 'failed',
        ]);

        return redirect()->back()->with('success', 'Withdrawal request has been mark as a failed transaction!');
    }
}
