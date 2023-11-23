<?php

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WalletsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PagesController::class, 'index']);

Auth::routes(['verify' => true]);

Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

Route::get('/markets', [PagesController::class, 'markets']);

Route::get('/market-crypto', [PagesController::class, 'market-crypto']);

Route::get('/faqs', [PagesController::class, 'faqs'])->name('faq');
Route::get('/about-us', [PagesController::class, 'aboutus'])->name('about');

Route::get('/terms-condition', [PagesController::class, 'terms']);

Route::get('/contact', [PagesController::class, 'contact']);

Route::get('/settings', [HomeController::class, 'settings'])->name('settings');


Route::resource('news', BlogController::class);




Route::prefix('profile')->group(function () {
    // GET
    Route::get('/', [UsersController::class, 'index'])->name('profile');
    Route::get('/complete', [UsersController::class, 'create'])->name('complete-profile');
    Route::get('/edit', [UsersController::class, 'edit'])->name('edit-profile');
    Route::get('/verify', [UsersController::class, 'verify_account'])->name('verify-account');

    // POST | PUT
    Route::put('/create', [UsersController::class, 'store'])->name('create-profile');
    Route::put('/update', [UsersController::class, 'update'])->name('update-profile');
    Route::post('/store-kyc', [UsersController::class, 'post_verify'])->name('store-kyc');
    Route::put('/update-kyc', [UsersController::class, 'update_verify'])->name('update-kyc');
    Route::post('/delete', [UsersController::class, 'deleteAccount'])->name('delete-account');

});

Route::prefix('wallet')->group(function () {
    Route::get('/', [WalletsController::class, 'index'])->name('wallet');
    Route::get('/minning-wall', [WalletsController::class, 'daily_mine'])->name('mine-now');
    Route::get('/estimate/{amount}/{type}', [WalletsController::class, 'get_estimated_price'])->name('estimated-price');
    Route::get('/make-payment', [WalletsController::class, 'paymentResponse'])->name('payment-status');
    Route::get('/generate-wallet', [WalletsController::class, 'generate_address'])->name('payment.generate-wallet');

    Route::post('/deposit', [WalletsController::class, 'deposit'])->name('wallet-deposit');
    Route::post('/add-wallet', [WalletsController::class, 'add_address'])->name('wallet-add');
    Route::post('/withdraw', [WalletsController::class, 'withdraw'])->name('wallet-withdraw');
    Route::post('/address', [WalletsController::class, 'add_address'])->name('wallet-address');
    Route::post('/pay', [WalletsController::class, 'knowPaymentStatus'])->name('check-status');
    Route::put('/update', [WalletsController::class, 'updateDeposit'])->name('update-payment');
    ROute::post('/mine', [WalletsController::class, 'mineNow'])->name('daily-mine');
});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin
// Route::group(['prefix' => 'admin'],function(){

//     Route::get('/login', [LoginController::class, 'index'])->name('admin.login');
//     Route::get('/reset-password', [LoginController::class, 'resetPassword'])->name('admin.reset-password');
//     Route::post('login', [LoginController::class, 'login'])->name('admin.login.post');

//     Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');

//     Route::resource('users', UserController::class);
// });
