<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\MenusController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\PaymentsController;

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

Route::get('resto', [MenusController::class, 'menuList'])->name('resto');
Route::get('resto/cart', [CartsController::class, 'cart'])->name('cart');
Route::get('resto/add-to-cart/{id}', [CartsController::class, 'addToCart'])->name('add.to.cart');
Route::patch('resto/update-cart', [CartsController::class, 'update'])->name('update.cart');
Route::delete('resto/remove-from-cart', [CartsController::class, 'remove'])->name('remove.from.cart');

Route::post('resto/orders', [PaymentsController::class, 'store'])->name('orders');
Route::get('payments', [PaymentsController::class, 'indexKasir'])->name('payments');;

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
    Route::get('search', 'UsersController@index')->name('search');
});
