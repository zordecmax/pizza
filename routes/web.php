<?php

use App\Http\Controllers\ArticleCategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Models\Product;
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

Route::get('/search', function() {
    $query = 'ita'; // <-- Change the query for testing.

    $products = Product::search($query)->get();

    return $products;
});

Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
Route::get('/article/{id}', [ArticleController::class, 'show'])->name('article');
Route::get('/tag/{id}', [TagController::class, 'show'])->name('articlesByTag');
Route::get('/article-category/{id}', [ArticleCategoryController::class, 'show'])->name('articlesByCategory');

Route::get('/orders/', [UserController::class, 'showOrders'])->name('userOrders')->middleware('auth');
Route::get('/cabinet/', [UserController::class, 'showCabinet'])->name('userCabinet')->middleware('auth');


Auth::routes();
Route::get('/contacts', ['uses' => function () {
    return view('contacts');
}, 'middleware' => \App\Http\Middleware\LoggingMiddleware::class]);



Route::get('/blog')->name('blog');
Route::view('/about', 'about')->name('about');
Route::view('/terms', 'terms')->name('terms');
//Route::view('/contacts', 'contacts')->middleware(\App\Http\Middleware\LoggingMiddleware::class)->name('contacts');
Route::post('/contacts', [ContactController::class, 'send'])->name('contacts');
Route::get('/mail', [ContactController::class, 'send']);
Route::get('/page/{slug}')->name('page');
Route::get('/menu', [ProductController::class, 'index'])->name('menu');
Route::get('/menu/{slug}', [CategoryController::class, 'show'])->name('category');
Route::get('/item/{id}', [ProductController::class, 'show'])->name('product');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart', [CartController::class, 'store'])->name('cart.add');
Route::get('/cart/delete', [CartController::class, 'erase'])->name('cart.erase');
Route::post('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.delete');
Route::get('/cart/done', [OrderController::class, 'create'])->name('cartDelivery');
