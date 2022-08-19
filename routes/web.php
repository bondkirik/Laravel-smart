<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Person\PersonController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,
]);

Route::get('/logout', [LoginController::class,'logout'])->name('get-logout');

Route::middleware(['auth'])->group(function () {
    Route::group([
        'prefix' => 'person',
        'as' => 'person.',
    ], function () {
        Route::get('/orders', [PersonController::class, 'index'])->name('orders.index');
        Route::get('/orders/{order}', [PersonController::class, 'show'])->name('orders.show');
    });

    Route::group([
        'prefix' => 'admin',
    ], function () {
        Route::group(['middleware' => 'is_admin'], function () {
            Route::get('/orders', [AdminController::class, 'index'])->name('home');
            Route::get('/orders/{order}', [AdminController::class, 'show'])->name('orders.show');
        });
        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);
    });
});

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/categories', [MainController::class, 'categories'])->name('categories');

Route::group(['prefix' => 'basket'], function () {
    Route::post('/add/{product}', [BasketController::class,'basketAdd'])->name('basket-add');
    Route::group([
        'middleware' => 'basket_not_empty',
    ], function (){
        Route::get('/', [BasketController::class,'basket'])->name('basket');
        Route::get('/place', [BasketController::class,'basketPlace'])->name('basket-place');
        Route::post('/remove/{product}', [BasketController::class,'basketRemove'])->name('basket-remove');
        Route::post('/place', [BasketController::class,'basketConfirm'])->name('basket-confirm');
    });
});


Route::get('/{category}', [MainController::class, 'category'])->name('category');
Route::get('/{category}/{product?}', [MainController::class, 'product'])->name('product');
