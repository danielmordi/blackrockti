<?php

namespace App\Console\Commands;

use App\Models\User;
use NumberFormatter;
use Illuminate\Console\Command;
use App\Models\TransactionHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;
use SebastianBergmann\CodeCoverage\Percentage;
use App\Notifications\DailyReturnsNotification;

class autoUpdateDailyProfits extends Command
{
    use Notifiable;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:updateprofits';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto update and add to user wallet balance with profit daily';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::where('role_id', '!=', 1)->get();
        // $users = User::where('id', 1)->get();

        foreach ($users as $user) {
          $totalAmountDeposited = floatval(preg_replace("/[^0-9.]/", "", $user->total_profit));
          $packagePercentage = !isset($user->packages->percentage) ? '' : $user->packages->percentage;
          // Calculate daily ROI
          $profit = (floatval($packagePercentage) / 100) * $totalAmountDeposited;

          // If investmentDuration = profitCount, stop adding
          // profit to user account daily.
          if ($user->profitCount >= $user->investmentDuration) {
            continue;
          } else {
            $user->profitCount += 1;
          }

          // Update
          $user->totalProfitEarned = floatval(preg_replace("/[^0-9.]/", "", $user->totalProfitEarned)) + $profit;
          $user->wallet_balance = floatval(preg_replace("/[^0-9.]/", "", $user->wallet_balance)) + $profit;
          $user->save();

          // Create transaction history
          $trans = TransactionHistory::create([
            'user_id' => $user->id,
            'type' => 'ROI',
            'description' => "Daily profit of {$profit} was added to your wallet!",
            'amount' => $profit,
            'status' => 'completed'
          ]);
          
          $fmt = new NumberFormatter('en_US', NumberFormatter::CURRENCY);
          $trans->amount = $fmt->formatCurrency(floatval($trans->amount), 'USD');

          Notification::send($user, new DailyReturnsNotification($trans, $user));
        }

        echo "Update was successful!".PHP_EOL;
    }
}
