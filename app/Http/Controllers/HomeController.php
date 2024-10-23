<?php

namespace App\Http\Controllers;

use App\Models\Coin;
use App\Models\User;
use App\Models\Deposit;
use App\Models\Package;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use App\Models\Settings\Site;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
      $site = Site::find(1);
      $packages = Package::get();
      return view('home.index', compact('site', 'packages'));
    }

    public function activated()
    {
      return view('user.activated');
    }

    public function verifyAccount(Request $request)
    {
      $user = User::find($request->uid);
      $user->is_activated = 'true';
      $user->save();

      $request->session()->flash('message', 'Account verification completed.');

      return redirect()->back();
    }

    public function about()
    {
        return view('home.about');
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function admin()
    {
      $deposits = Deposit::where('amount', 'completed')->get()->count();
      $withdrawals = Withdrawal::where('amount', 'completed')->get()->count();
      $blocked = User::where('is_blocked', '1')->get()->count();
      $TotalInvestment = User::where('role_id', 2)->sum('wallet_balance');
      $users = User::where('role_id', 2)->get();
      return view('admin.dashboard', compact('users', 'deposits', 'withdrawals', 'TotalInvestment', 'blocked'));
    }

    public function user()
    {
      $package = Package::where('id', Auth::user()->package)->first();
      $coins = Coin::get();
      
      return view('user.dashboard')->with([
        'package' => $package,
        'coins' => $coins
      ]);
    }

    public function faqs()
    {
      return view('home.faqs');
    }

    public function services()
    {
      return view('home.services');
    }

    public function pricing()
    {
      $packages = Package::get();
      return view('home.pricing', compact('packages'));
    }
}
