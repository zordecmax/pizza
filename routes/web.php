<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Auth::routes();

Route::get('/blog')->name('blog');
Route::get('/about')->name('about');
Route::get('/contacts')->name('contacts');
Route::get('/article/{slug}')->name('article');
Route::get('/page/{slug}')->name('page');;
Route::get('/menu')->name('menu');
Route::get('/menu/{category}')->name('category');
Route::get('/item/{slug}')->name('product');
Route::get('/cart')->name('cart');
Route::get('/cart/delivery')->name('cartDelivery');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
