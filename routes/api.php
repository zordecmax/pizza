<?php

use App\Http\Api\Controllers\ArticleCategoryApiController;
use App\Http\Api\Controllers\ProductApiController;
use App\Http\Api\Controllers\OrderApiController;
use App\Http\Api\Controllers\ProductCategoryApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Api\Controllers\ArticleApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/order', [OrderApiController::class, 'store'])->name('order.store');
Route::get('/search', [\App\Http\Controllers\ProductSearchController::class, 'search']);
//Route::get('/authuser', [OrderApiController::class, 'store'])->name('order.store');


Route::apiResource('articles', ArticleApiController::class)->only(['index', 'show']);
Route::apiResource('article-category', ArticleApiController::class)->only(['index', 'show']);
Route::apiResource('products', ArticleApiController::class)->only(['index', 'show']);
Route::apiResource('product-category', ArticleApiController::class)->only(['index', 'show']);

Route::group(['middleware' => 'auth:api'], function () {
        Route::resource('articles', ArticleApiController::class)->except(['index', 'show']);
        Route::resource('article-category', ArticleApiController::class)->except(['index', 'show']);
        Route::resource('products', ArticleApiController::class)->except(['index', 'show']);
        Route::resource('product-category', ArticleApiController::class)->except(['index', 'show']);
});

//Route::resources([
//    'articles' => ArticleApiController::class,
//    'article-category' => ArticleCategoryApiController::class,
//    'products' => ProductApiController::class,
//    'product-category' => ProductCategoryApiController::class,
//]);

//Route::middleware('auth:api')->post('/user', function (Request $request) {
//
//});
Route::get('/user', function (Request $request) {
    dd($request->all());
    return $request->user();
});
