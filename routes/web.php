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

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Models\Product;

Route::view('/login', 'login')->middleware('guest')->name('auth.login');
Route::post('/attempting', [AuthController::class, 'attempting']);
Route::get('/logout', [AuthController::class, 'logout']);


Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::group(['prefix' => 'order'], function () {
        // Create
        Route::get('/create', [OrderController::class, 'create'])->name('order.create');
        Route::get('/create/customer', [OrderController::class, 'customer'])->name('order.create.customer');
        Route::post('/store', [OrderController::class, 'store'])->name('order.store');

        // ONGOING
        Route::group(['prefix' => 'ongoing'], function () {
            Route::get('/', [OrderController::class, 'ongoing'])->name('order.ongoing');
            Route::get('/{order_id}/detail', [OrderController::class, 'detail'])->name('order.ongoing.detail');
            Route::get('/{order_detail_id}/working', [OrderController::class, 'onworking'])->name('order.ongoing.onworking');
            Route::get('/{order_detail_id}/paid', [OrderController::class, 'paid'])->name('order.ongoing.paid');
            Route::get('/{order_detail_id}/unpaid', [OrderController::class, 'unpaid'])->name('order.ongoing.unpaid');
            Route::post('/return', [OrderController::class, 'returned'])->name('order.ongoing.returned');    
            Route::get('/comingsoon', [OrderController::class, 'comingsoon'])->name('order.ongoing.comingsoon');
            Route::get('/completed', [OrderController::class, 'completed'])->name('order.completed');

            // Aborting order
            Route::get('/{order_id}/abort', [OrderController::class, 'aborting'])->name('order.aborting');

            // Scheduling next Order
            Route::post('/make-schedule', [OrderController::class, 'scheduling'])->name('order.scheduling');
            Route::get('/confirm-schedule/{order_schedule_id}', [OrderController::class, 'scheduling_confirm'])->name('order.scheduling.confirm');
            Route::get('/cancel-schedule/{order_schedule_id}', [OrderController::class, 'scheduling_cancel'])->name('order.scheduling.cancel');
        });

        // Add / Remove product on cart
        Route::get('/rmproduct/{product_code}', [OrderController::class, 'rmproduct'])->name('order.rmproduct');
        Route::get('/addproduct/{product_code}', [OrderController::class, 'addproduct'])->name('order.addproduct');
    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('products');
        Route::get('/{product_id}/history', [ProductController::class, 'history'])->name('products.history');
        Route::post('/', [ProductController::class, 'store'])->name('product.store');
        Route::get('/{product_id}/delete', [ProductController::class, 'delete'])->name('product.delete');
        Route::post('/{order_id}/update', [ProductController::class, 'update'])->name('product.update');
    });

    Route::group(['prefix' => 'category'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('categories');
        Route::get('/{category_id}/products', [CategoryController::class, 'products'])->name('category.products');
    });

});


// TESTING
Route::get('clr', function() { session()->flush(); });
Route::get('cart', function() {
    $carts = session()->get('cart');
    dd($carts);
});

// AJAX Request
Route::get('/products', [ProductController::class, 'ajax_search_product']);

