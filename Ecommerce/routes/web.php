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
Route::middleware('auth')->group(function () {
    Route::controller(\App\Http\Controllers\EcommerceController::class)->group(function () {
        Route::get('/dashboard', 'index');
        Route::get('/category/subcategory/{subcategory}/{slug}', 'getAttributes')->name('subcategories.index');
    });
    Route::resource('stores', \App\Http\Controllers\StoreController::class);
    Route::resource('products', \App\Http\Controllers\ProductController::class);
    Route::get('subcategories', [\App\Http\Controllers\ProductController::class, 'getSubcategories'])->name('products.subcategories');
    Route::controller(\App\Http\Controllers\CartController::class)->group(function () {
        Route::get('/navbar-carts', 'navbarCart')->name('navbar.carts');
        Route::get('carts/checkout', 'checkout')->name('carts.checkout');
        Route::delete('/carts/{cart}', 'destroy')->name('navbar.carts.destroy');
        Route::post('/carts', 'addToCart')->name('carts.store');
    });

    Route::controller(\App\Http\Controllers\PaymentController::class)->group(function () {
        Route::post('/orders/detail', 'orderDetails')->name('orders.orderDetails');
        Route::post('/orders/address/validate', 'validateOrderAddress')->name('orders.validateOrderAddress');
        Route::post('/orders/address', 'orderAddress')->name('orders.orderAddress');
        Route::post('/payment', 'payment')->name('stripe.payment');

    });
    Route::controller(\App\Http\Controllers\WishlistController::class)->group(function () {
        Route::get('/wishlists/index', 'index')->name('wishlists.index');
        Route::get('/navbar/wishlists', 'navbarWishlistsCounter')->name('navbar.wishlists');
        Route::post('/wishlists', 'addToWishlist')->name('wishlists.store');
        Route::delete('/wishlists/{wishlist}', 'destroy')->name('wishlists.destroy');
    });
});

// Laravel socialite routes
Route::controller(\App\Http\Controllers\SocialController::class)->group(function () {
    Route::get('{social}/redirect', 'redirect')->name('social.redirect');
    Route::get('auth/{social}/callback', 'callback')->name('social.callback');
});

Route::get('test', function () {

});

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::fallback(function () {
    return view('error.404');
})->name('error');
