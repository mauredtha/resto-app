<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\MenusController;

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
    return view('categories.index');
});

// Route::post('/generates', [QaGeneratorsController::class, 'store']);
Route::resource('categories', CategoriesController::class);
Route::resource('menus', MenusController::class);
