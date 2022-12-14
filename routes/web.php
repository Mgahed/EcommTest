<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Order;
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

Route::group(['prefix' => 'brands', 'controller' => BrandController::class], function () {
    Route::get('/', 'brands')->name('brands.index');
    Route::get('details/{id}', 'details')->name('brands.details');
});

Route::group(['prefix' => 'products', 'controller' => ProductController::class], function () {
    Route::get('/', 'products')->name('products.index');
    Route::get('details/{id}', 'details')->name('products.details');
});

Route::group(['prefix' => 'cart', 'controller' => CartController::class, 'middleware' => ['auth']], function () {
    Route::get('/', 'cart')->name('cart.index');
    Route::get('add/{id}', 'add')->name('cart.add');
    Route::get('remove/{id}', 'remove')->name('cart.remove');
    Route::get('update/{id}', 'update')->name('cart.update');
});

Route::group(['prefix' => 'checkout', 'controller' => OrderController::class, 'middleware' => ['auth']], function () {
    Route::get('/', 'checkout')->name('checkout.index');
    Route::post('store', 'store')->name('checkout.store');
});

Route::group(['prefix' => 'orders', 'controller' => OrderController::class, 'middleware' => ['auth']], function () {
    Route::get('/', 'orders')->name('orders.index');
    Route::get('details/{id}', 'details')->name('orders.details');
});

Auth::routes();

/*----- admin -----*/
Route::group(['prefix' => 'admin','middleware' => ['role:admin']], function () {
    Route::get('/', [HomeController::class, 'admin'])->name('admin.index');

    // brands
    Route::group(['prefix' => 'brands', 'controller' => BrandController::class], function () {
        Route::get('/', 'index')->name('admin.brands.index');
        Route::get('/create', 'create')->name('admin.brands.create');
        Route::post('/store', 'store')->name('admin.brands.store');
        Route::get('/edit/{id}', 'edit')->name('admin.brands.edit');
        Route::post('/update/{id}', 'update')->name('admin.brands.update');
        Route::get('/delete/{id}', 'delete')->name('admin.brands.delete');
    });

    // products
    Route::group(['prefix' => 'products', 'controller' => ProductController::class], function () {
        Route::get('/', 'index')->name('admin.products.index');
        Route::get('/create', 'create')->name('admin.products.create');
        Route::post('/store', 'store')->name('admin.products.store');
        Route::get('/edit/{id}', 'edit')->name('admin.products.edit');
        Route::post('/update/{id}', 'update')->name('admin.products.update');
        Route::get('/delete/{id}', 'delete')->name('admin.products.delete');
    });

    // users
    Route::group(['prefix' => 'users', 'controller' => UserController::class], function () {
        Route::get('/', 'index')->name('admin.users.index');
        Route::get('/update-role/{id}/{role}', 'updateRole')->name('admin.users.update');
        Route::get('/delete/{id}', 'delete')->name('admin.users.delete');
    });

    // orders
    Route::group(['prefix' => 'orders', 'controller' => OrderController::class], function () {
        Route::get('/', 'index')->name('admin.orders.index');
        Route::get('/details/{id}', 'adminOrderDetails')->name('admin.orders.details');
        Route::get('/update-status/{id}/{status}', 'updateStatus')->name('admin.orders.update');
    });
});
