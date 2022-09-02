<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\MenusController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\QrCodeController;

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

Route::get('/', function () {
    return view('login');
});

Route::get('/qrcode', [QrCodeController::class, 'indexQr']);
Route::post('download-qr-code/{type}', 'QrCodeController@downloadQRCode')->name('qrcode.download');

Route::get('/order-category', [MenusController::class, 'showCategoryOrder'])->name('order.category');

Route::get('resto/{type}', [MenusController::class, 'menuList'])->name('resto');
// Route::get('resto', [MenusController::class, 'menuList'])->name('resto');
Route::get('resto/{type}/cart', [CartsController::class, 'cart'])->name('cart');
Route::get('resto/{type}/add-to-cart/{id}', [CartsController::class, 'addToCart'])->name('add.to.cart');
Route::patch('resto/{type}/update-cart', [CartsController::class, 'update'])->name('update.cart');
Route::delete('resto/{type}/remove-from-cart', [CartsController::class, 'remove'])->name('remove.from.cart');

Route::post('resto/orders', [PaymentsController::class, 'store'])->name('orders');

//Route::get('/', 'AuthController@showFormLogin')->name('login');
Route::get('login', [UsersController::class, 'showLogin'])->name('login');
Route::post('login', [UsersController::class, 'login']);

// Route::get('cms', [UsersController::class, 'showLogin'])->name('cms');
// Route::post('login', [UsersController::class, 'login'])->name('login');

Route::group(['middleware' => 'auth'], function () {

    Route::get('logout', [UsersController::class, 'logout'])->name('logout');

    Route::resource('categories', CategoriesController::class);
    Route::resource('menus', MenusController::class);
    Route::resource('users', UsersController::class);
    Route::get('/dashboards', [App\Http\Controllers\DashboardsController::class, 'index']);
    Route::get('search', 'UsersController@index')->name('search');

    Route::resource('payments', PaymentsController::class);
    Route::get('invoice/{id}', [PaymentsController::class, 'print'])->name('invoice');
    Route::resource('qris', QrCodeController::class);
});
