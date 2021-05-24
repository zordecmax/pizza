<?php

use App\Http\Controllers\ArticleCategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;
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


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
Route::get('/article/{id}', [ArticleController::class, 'show'])->name('article');
Route::get('/tag/{id}', [TagController::class, 'show'])->name('articlesByTag');
Route::get('/category/{id}', [ArticleCategoryController::class, 'show'])->name('articlesByCategory');


Auth::routes();

Route::get('/blog')->name('blog');
Route::get('/about')->name('about');
Route::view('/contacts', 'contacts')->name('contacts');

Route::get('/page/{slug}')->name('page');;
Route::get('/menu')->name('menu');
Route::get('/menu/{category}')->name('category');
Route::get('/item/{slug}')->name('product');
Route::get('/cart')->name('cart');
Route::get('/cart/delivery')->name('cartDelivery');
