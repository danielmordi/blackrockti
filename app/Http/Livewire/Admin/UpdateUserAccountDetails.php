<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coin;
use App\Models\Token;
use App\Models\Deposit;
use App\Models\Package;
use Livewire\Component;
use App\Models\Withdrawal;
use Illuminate\Support\Facades\Hash;

class UpdateUserAccountDetails extends Component
{
    public $showEditForm = false;
    public $user;
    public $packages;
    public $package;
    public $amt_invested;
    public $amt_withdrawn;
    public $portfolio_value;
    // public $token_balance;
    public $withdrawal_limit;
    public $total_value;
    public $market_value;
    public $yield;
    public $dividend;
    public $get_package;

    public function mount($user, $packages)
    {
        $this->user = $user;
        $this->packages = $packages;
        $this->package = $this->user->package;
        $this->get_package = Package::where('id', $this->package)->first();
        $this->amt_invested = $this->user->deposit->amount ?? 0;
        $this->amt_withdrawn = $this->user->bonus ?? 0;
        $this->portfolio_value = $this->user->totalProfitEarned ?? 0;
        // $this->token_balance = $this->user->usertoken->amount ?? 0;
        $this->withdrawal_limit = $this->user->withdrawal_limit ?? 0;
        $this->total_value = $this->user->total_value ?? 0;
        $this->market_value = $this->user->market_value ?? 0;
        $this->yield = $this->user->yield ?? 0;
        $this->dividend = $this->user->dividend ?? 0;
    }

    public function toggleEditForm()
    {
        $this->showEditForm = !$this->showEditForm;
    }

    public function updateUserAccount() {
        $userId = $this->user->id;

        // Get the first in Coin
        $coin = Coin::first();
        if (!$coin) {
           return session()->flash('error', 'Add a coin and wallet address <a href="/admin/coin">here</a>');
        } else {
            $coinId = $coin->id;
        }

        // Update or insert user deposit
        Deposit::updateOrCreate([
            'user_id' => $userId
        ], [
            'amount' => $this->amt_invested,
            'coin_id' => $coinId,
            'package_id' => $this->package,
            'status' => 'complete'
        ]);

        // Update or create user withdrawn total amout
        Withdrawal::updateOrCreate([
            'user_id' => $userId
        ], [
            'amount' => $this->amt_withdrawn,
            'coin_id' => $coinId,
            'withdraw_from' => 'totalProfitEarned',
            'wallet_id' => Hash::make('$value'),
            'status' => 'complete',
        ]);
            

        // Update user portfolio value
        $this->user->totalProfitEarned = $this->portfolio_value;
        $this->user->package = $this->package;
        $this->user->withdrawal_limit = $this->withdrawal_limit;
        $this->user->bonus = $this->amt_withdrawn;
        $this->user->total_value = $this->total_value;
        $this->user->market_value = $this->market_value;
        $this->user->yield = $this->yield;
        $this->user->dividend = $this->dividend;
        $this->user->save();
        // dd($this->user->withdrawal_limit);

        // Insert or update user token balance
        // Token::updateOrCreate([
        //     'user_id' => $this->user->id
        // ], [
        //     'coin_id' => $coinId,
        //     'amount' => $this->token_balance,
        //     'payment_method' => 'BTC',
        //     'token_value' => 0.1023
        // ]);
        // dd($token);

        // Send alert
        session()->flash('message', 'User account details updated successfully.');
        $this->showEditForm = false;
    }
    
    public function render()
    {
        return view('livewire.admin.update-user-account-details');
    }
}
