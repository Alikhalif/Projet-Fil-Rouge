<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Livewire\Frontend\Checkout\CheckoutShow;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/collections', [FrontendController::class, 'categories']);
Route::get('/collections/{category_name}', [FrontendController::class, 'products']);

Route::get('/collections/{category_name}/{product_name}', [FrontendController::class, 'productView']);

Route::get('search', [FrontendController::class, 'searchProducts']);
Route::get('products', [FrontendController::class, 'allproduct']);

Route::middleware(['auth'])->group(function(){
    Route::get('cart', [CartController::class, 'index']);
    Route::get('checkout', [CheckoutController::class, 'index']);
    Route::get('order', [OrderController::class, 'index']);

    Route::get('stripe', [CheckoutController::class, 'stripe']);

    Route::get('check', [CheckoutController::class, 'checkout']);

    Route::get('success', [CheckoutShow::class, 'success'])->name('success');
    Route::get('index', [CheckoutShow::class, 'success'])->name('index');
});


Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function (){
    Route::get('dashboard', [DashboardController::class, 'index']);

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category', 'index');
        Route::get('/category/create', 'create');
        Route::post('/category/store', 'store');
        Route::get('/category/{category}/edit', 'edit');
        Route::put('/category/{category}', 'update');
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('/products', 'index');
        Route::get('/products/create', 'create');
        Route::post('/products/store', 'store');
        Route::get('/products/{product}/edit','edit');
        Route::put('/products/{product}','update');
        Route::get('/products/{product}/delete','destroy');
        Route::get('/product-image/{product_image_id}/delete','destroyImage');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/users','index');
        Route::get('/users/create','create');
        Route::post('/users','store');
        Route::get('/users/{user}/edit','edit');
        Route::put('/users/{user}','update');
        Route::get('/users/{user}/delete','destroy');
    });


});
