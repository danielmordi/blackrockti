<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoinController;
use App\Http\Controllers\HomeController;
use App\Notifications\NewDepositRequest;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ReferralController;

// use App\Http\Controllers\SupportController;
use App\Http\Controllers\WithdrawController;
use Illuminate\Support\Facades\Notification;
use App\Http\Controllers\settings\SiteController;
use App\Http\Controllers\TransactionLogController;
use App\Http\Controllers\ContactUs\ContactUsController;

//Route::get('/', function () {
//  return view('auth.login');
//});
Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/services', [HomeController::class, 'services']);
Route::get('/faqs', [HomeController::class, 'faqs']);
Route::get('/pricing', [HomeController::class, 'pricing']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::post('/contact', [ContactUsController::class, 'store']);
Route::get('terms', function () {
    return view('terms');
})->name('terms');
Route::get('policy', function () {
    return view('home.privacy-policy')->name('privcy.policy');
});
Route::get('whitepaper', function () {
    return view('home.whitepaper');
})->name('whitepaper');


Route::group(['middleware' => 'auth'], function () {
    // ADMIN
    Route::group(['middleware' => 'App\Http\Middleware\authCheck:admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/', [HomeController::class, 'admin'])->name('dashboard');
        Route::get('packages', [PackageController::class, 'index'])->name('packages');
        Route::post('packages', [PackageController::class, 'store'])->name('packages.store');
        Route::get('packages/{id}', [PackageController::class, 'edit'])->name('packages.edit');
        Route::patch('packages/{id}', [PackageController::class, 'update'])->name('packages.update');
        Route::delete('packages/{id}', [PackageController::class, 'destroy'])->name('packages.delete');
        Route::get('coin', [CoinController::class, 'index'])->name('coin');
        Route::post('coin', [CoinController::class, 'store'])->name('coin.store');
        Route::get('coin/{id}', [CoinController::class, 'edit'])->name('coin.edit');
        Route::patch('coin/{id}', [CoinController::class, 'update'])->name('coin.update');
        Route::delete('coin/{id}', [CoinController::class, 'destroy'])->name('coin.delete');
        Route::get('depositlog', [TransactionLogController::class, 'depositlog'])->name('depositlog');
        Route::get('deposit/confirm/{id}', [TransactionLogController::class, 'confirm'])->name('confirmDeposit');
        Route::get('deposit/cancel/{id}', [TransactionLogController::class, 'cancelDeposit'])->name('cancelDeposit');
        Route::get('withdrawalog', [TransactionLogController::class, 'withdrawalog'])->name('withdrawalog');
        Route::get('withdrawalog/confirm/{id}', [TransactionLogController::class, 'confrimWithdrawal'])->name('confirmWithdrawal');
        Route::get('withdrawalog/cancel/{id}', [TransactionLogController::class, 'cancelWithdrawal'])->name('cancelWithdrawal');
        Route::get('user/{id}', [AdminController::class, 'viewUser'])->name('view.user');
        Route::patch('user/view/update/{id}', [AdminController::class, 'update'])->name('update');
        Route::patch('user/view/update/wb/{id}', [AdminController::class, 'walletBal'])->name('update.wallet');
        Route::patch('user/view/update/bonus/{id}', [AdminController::class, 'bonus'])->name('update.bonus');
        Route::patch('user/view/update/hr/{id}', [AdminController::class, 'hashRate'])->name('update.hash-rate');
        Route::patch('user/view/update/package/{id}', [AdminController::class, 'package'])->name('update.package');
        Route::patch('user/view/block/{id}', [AdminController::class, 'blockUser'])->name('block-user');
        Route::delete('user/view/delete/{id}', [AdminController::class, 'deleteUser'])->name('delete-user');
        Route::get('settings', [SiteController::class, 'index'])->name('site');
        Route::post('settings/update', [SiteController::class, 'updateSettings']);
        Route::get('settings/profile', [SiteController::class, 'profile'])->name('profile');
        Route::post('settings/update/profile/{id}', [SiteController::class, 'updateProfile'])->name('profile.update');
        Route::post('user/send/mail', [AdminController::class, 'sendMail']);
        Route::get('/broadcast', [AdminController::class, 'broadcast'])->name('broadcast');
        Route::post('/send/broadcast', [AdminController::class, 'SendBroadcast']);
        Route::get('token-sale', [AdminController::class, 'tokenSale'])->name('token-sale');
        // Login as user
        Route::get('/{id}', [AdminController::class, 'loginAs'])->name('adminLoginAsUser');
        // Verify Account
        Route::post('activate/account', [HomeController::class, 'verifyAccount'])->name('verify');
        // Set withdrawal limit
        Route::post('/set/withdrawal-limit/{id}', [AdminController::class, 'set_withdrawal_limit'])->name('set.withdrawal_limit');
    });

    // USER
    Route::get('/activate', [HomeController::class, 'activated'])->name('activated');
    Route::group(['middleware' => ['App\Http\Middleware\authCheck:user', 'isActivated'], 'prefix' => 'account', 'as' => 'user.'], function () {
        Route::get('/', [HomeController::class, 'user'])->name('dashboard');
        Route::get('/deposit', [DepositController::class, 'index'])->name('deposit');
        Route::post('/deposit', [DepositController::class, 'store'])->name('deposit.store');
        Route::post('/reinvest', [DepositController::class, 'reinvest'])->name('reinvest');
        Route::get('/deposit/info/{id}', [DepositController::class, 'showDepositInfo'])->name('deposit.info');
        Route::get('/withdraw', [WithdrawController::class, 'index'])->name('withdraw');
        Route::post('/withdraw', [WithdrawController::class, 'store'])->name('withdraw.store');
        Route::get('/mining', [PackageController::class, 'packageView'])->name('mining');
        Route::get('/referrals', [ReferralController::class, 'index'])->name('referrals');
        Route::get('/transactions', [TransactionLogController::class, 'index'])->name('transactions');
        Route::post('/buytoken', [TokenController::class, 'buyToken'])->name('buy-token');
        // Login as admin
        Route::get('/{id}', [AdminController::class, 'loginAs'])->name('loginAsAdmin');
    });
});

Route::get('/storage-link', function () {
    Artisan::call('storage:link');
});

Route::get('/test', function () {
    $email = ['test@mail.com', 'badgang@mail.com'];
    $deposit = \App\Models\Deposit::find(11);
    foreach ($email as $e) {
        Notification::route('mail', $e)->notify(new NewDepositRequest($deposit));
    }
//    Notification::send($email, new NewDepositRequest());
});
