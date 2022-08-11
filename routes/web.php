<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\MenusController;
use App\Http\Controllers\UsersController;

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
});
