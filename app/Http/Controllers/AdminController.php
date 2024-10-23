<?php

namespace App\Http\Controllers;

use App\Models\User;
use NumberFormatter;
use App\Models\Token;
use App\Models\Deposit;
use App\Models\Package;
use App\Models\Withdrawal;
use App\Mail\SendBroadcast;
use App\Mail\SendMailToUser;
use Illuminate\Http\Request;
use App\Models\TransactionHistory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;

class AdminController extends Controller
{
  public function broadcast()
  {
    return view('admin.broadcast');
  }

  public function SendBroadcast(Request $request)
  {
    $subject = $request->subject;
    $msg = $request->msg;

    $users = User::where('role_id', '2')->get();

    foreach ($users as $user) {
      $message = "Dear, {$user->name} <br> {$msg}";
      Mail::to($user->email)->send(new SendBroadcast($message, $subject));
    }

    return response()->json(['success' => 'Sent!']);
  }

  public function viewUser($id)
  {
    $user = User::findOrFail($id);
    $packages = Package::all();
    $deposits = Deposit::where('user_id', $id)->get();
    $withdrawals = Withdrawal::where('user_id', $id)->get();
    $transactions = TransactionHistory::where('user_id', $id)->latest()->paginate(10);

    $percentage = !isset($user->packages->percentage) ? '' : $user->packages->percentage;
    $roi = (floatval($percentage) / 100) * floatval(preg_replace("/[^0-9.]/", "", $user->hashing_fee)) ?? 0.00;

    $fmt = new NumberFormatter('en_US', NumberFormatter::CURRENCY);

    return view('admin.view')->with([
      'user' => $user,
      'packages' => $packages,
      'deposits' => $deposits,
      'withdrawals' => $withdrawals,
      'transactions' => $transactions,
      'roi' => $fmt->formatCurrency($roi, 'USD')
    ]);
  }

  public function sendMail(Request $request)
  {
    $to = $request->email;
    $subject = $request->subject;
    $msg = $request->msg;

    Mail::to($to)->send(new SendMailToUser($msg, $subject));

    return response()->json([
      'success' => 'Email sent!'
    ]);
  }

  public function update(Request $request, $id)
  {
    $user = User::find($id);

    // Get package percentage
    // $percentage = floatval($user->packages->percentage);

    $from = $request->from;
    $value = floatval($request->value);
    if ($request->typeOfTransaction == 'credit') {
      if ($from == 'hashing_fee') {
        $user->wallet_balance = $value
          + floatval(preg_replace("/[^0-9.]/", "", $user->wallet_balance));
      }
      $value = floatval(preg_replace("/[^0-9.]/", "", $user->$from)) + $value;
    } elseif ($request->typeOfTransaction == 'debit' && floatval($user->$from) == 0) {
      if (floatval(preg_replace("/[^0-9.]/", "", $user->$from)) < $value) {
        return response()->json('Insufficient fund', 422);
      } else {
        if ($from == 'hashing_fee') {
          $user->wallet_balance = $value - floatval(preg_replace("/[^0-9.]/", "", $user->wallet_balance));
        }
        $value = floatval(preg_replace("/[^0-9.]/", "", $user->$from)) - $value;
      }
    } else {
      echo 'Please enter a valid amount';
    }

    // Update user's profile.
    $user->$from = $value;
    $user->investmentDuration = $user->packages->duration;
    $user->save();

    return Response::json([
      'success' => "You have successfully updated {$user->name}'s Account balance."
    ]);
  }

  public function blockUser(Request $request, $id)
  {
    $user = User::findOrFail($id);

    if ($user->is_blocked != 1) {
      $user->is_blocked = 1;
      $msg = 'User has been successfully blocked';
    } else {
      $user->is_blocked = 0;
      $msg = 'User has been successfully unblocked';
    }

    $user->save();

    return redirect()->back()->with([
      'success' => $msg
    ]);
  }

  public function deleteUser(Request $request, $id)
  {
    try {
      // Start a database transaction
      DB::beginTransaction();

      // Find the user
      $user = User::find($id);

      if (!$user) {
        return redirect('admin/')->with([
          'status' => 'User not found',
        ]);
      }

      // Update dependent records (set referral_id to null)
      User::where('referrer_id', $id)->update(['referrer_id' => null]);

      // Delete the user
      $user->delete();

      // Commit the transaction
      DB::commit();

      return redirect('admin/')->with([
        'status' => 'User\'s account was successfully deleted',
      ]);
    } catch (\Exception $e) {
      // An error occurred, rollback the transaction
      DB::rollBack();

      return redirect('admin/')->with([
        'status' => 'Error deleting user: ' . $e->getMessage(),
      ]);
    }
  }

  public function walletBal(Request $request, $id)
  {
    $user = User::find($id);
    $amount = $request->input('amount');
    $amount = preg_replace("/[^0-9.]/", "", $amount);

    $user->wallet_balance = $amount;
    $user->save();

    return Response::json([
      'success' => "You have successfully updated {$user->name}'s wallet balanace."
    ]);
  }

  public function bonus(Request $request, $id)
  {
    $user = User::find($id);
    $amount = $request->input('amount');
    $amount = preg_replace("/[^0-9.]/", "", $amount);

    $user->bonus = $amount;
    $user->save();

    return Response::json([
      'success' => "You have successfully updated {$user->name}'s Bonus."
    ]);
  }

  public function hashRate(Request $request, $id)
  {
    $user = User::find($id);
    $amount = $request->input('amount');
    $amount = preg_replace("/[^0-9.]/", "", $amount);

    $user->hashing_fee = $amount;
    $user->save();

    return Response::json([
      'success' => "You have successfully updated {$user->name}'s Hashing fee."
    ]);
  }

  public function package(Request $request, $id)
  {
    $user = User::find($id);

    $package = Package::find($request->p);

    $user->package = $package->name;
    $user->package_id = $package->id;
    $user->save();

    return Response::json([
      'success' => "You have successfully updated {$user->name}'s package."
    ]);
  }

  public function loginAs($id)
  {
    if (auth()->user()->role_id == 1) {
      session()->put('hasClonedUser', auth()->user()->id);
      auth()->loginUsingId($id);
      return redirect('/account/');
    }

    $admin = User::find(session('hasClonedUser'));

    if (session()->get('hasClonedUser') && $admin->role_id == 1) {
      auth()->loginUsingId(session('hasClonedUser'));
      session()->remove('hasClonedUser');
      return redirect('/admin/');
    }
  }

  public function tokenSale()
  {
    $tokens = Token::orderBy('created_at', 'ASC')->paginate(10);
    return view('admin.token', compact('tokens'));
  }

  public function set_withdrawal_limit(Request $request, $id)
  {
    $usr = User::find($id);
    $usr->withdrawal_limit = $request->input('withdrawal_limit');
    $usr->save();

    // dd($request->input('withdrawal_limit'));

    return redirect()->back()->with('success', 'Withdrawal limit has been set successfully.');
  }
}
