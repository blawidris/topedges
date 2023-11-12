<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WalletController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'index'])->name('admin.login');
Route::get('/reset-password', [LoginController::class, 'resetPassword'])->name('admin.reset-password');
Route::post('login', [LoginController::class,'login' ])->name('admin.login.post');

Route::post('logout', [LoginController::class, 'logout'])->name('admin.logout');


Route::resource('customers', UserController::class)->names([
    'index' => 'admin.customers',
    'show' => 'admin.customer.show',
    'edit' => 'admin.customer.edit',
    'update' => 'admin.customer.update',
    'destroy' => 'admin.customer.delete',
]);

Route::put('customer/wallet', [UserController::class, 'updateWallet'])->name('admin.customer.wallet.update');
Route::put('customer/{customer}/wallet/{wallet}', [WalletController::class, 'approve'])->name('admin.customer.transaction.approve');
Route::delete('customer/{customer}/wallet/{wallet}', [WalletController::class, 'destroy'])->name('admin.customer.transaction.delete');

Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');


Route::resource('wallets', WalletController::class)->names([
    'index' => 'admin.wallets'
]);
