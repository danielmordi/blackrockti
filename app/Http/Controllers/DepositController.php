<?php

namespace App\Http\Controllers;

use App\Models\Coin;
use App\Models\Deposit;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Events\AdminNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewDepositRequest;
use App\Notifications\Admin\NewDepositAlert;

class DepositController extends Controller
{
    public function index()
    {
        $coins = Coin::get();
        $packages = Package::get();
        $deposit = Deposit::where('user_id', Auth::user()->id)->latest()->paginate(5);
        return view('user.deposit')->with([
            'coins' => $coins,
            'packages' => $packages,
            'logs' => $deposit
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'coin' => 'required|integer',
            'package' => 'required|integer',
            'deposit_amount' => 'required',
        ],
            [
                'coin.integer' => 'Choose a valid coin',
                'package.integer' => 'Choose a valid package',
                'deposit_amount' => 'Please enter a valid deposit amount without commas'
            ]);

        if ($request->input('deposit_amount')) {
            $deposit_amount = preg_replace("/[^0-9.]/", "", $request->deposit_amount);
        }

        $package = Package::find($request->input('package'));

        if ($request->input('deposit_amount') < $package->min_val) {
            // dd('Hello');
            return redirect()->back()
                ->with('failed', "The minimum amount for {$package->name} is \${$package->min_val}");
        }


        $deposit = new Deposit;
        $deposit->user_id = Auth::user()->id;
        $deposit->coin_id = $request->input('coin');
        $deposit->package_id = $request->input('package');
        $deposit->amount = $deposit_amount;
        $deposit->status = 'pending';
        $deposit->save();

        // Auth::user()->notify(new NewDepositRequest($deposit));

        // Notify Admin
        // $msg = 'A deposit of '.$deposit->amout.' wa made by '.Auth::user()->name.'.';
        // mail('admin@projectwhales.com', 'New Deposit', $msg);

        return redirect()->route('user.deposit.info', $deposit->id)
            ->with('success', 'Your deposit request has been sent successfully, please follow the instructions below to complete deposit')->withInput();
    }

    public function reinvest(Request $request)
    {

      $currentBalance = preg_replace("/[^0-9.]/", "", Auth::user()->wallet_balance);

      if (floatval($currentBalance) < floatval($request->deposit_amount) || floatval($currentBalance) == 0) {
        $package = Package::find($request->package_id);
        if ($request->input('deposit_amount') < $package->min_val) {
          return response()->json("The minimum amount for {$package->name} is \${$package->min_val}", 404);
        }
        return response()->json('Insufficient balance, please enter less than or equal to '. Auth::user()->wallet_balance, 404);
      } else {
        $deposit = Deposit::create([
          'user_id' => Auth::user()->id,
          'coin_id' => $request->coin_id,
          'package_id' => $request->package_id,
          'amount' => $request->amount,
          'status' => 'Reinvest pending'
        ]);
      }

      return response()->json('Your deposit request has been sent successfully', 200);
    }

    public function showDepositInfo($id)
    {
        $latestDeposit = Deposit::where([
            'user_id' => Auth::user()->id,
        ])->findOrFail($id);

        return view('user.deposit-info')->with([
            'currentDeposit' => $latestDeposit,
        ]);
    }

    public function buyToken(Request $request)
    {
        dd($request->all());
    }
}
