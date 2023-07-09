<?php

use App\Http\Controllers\CartCountController;
use App\Http\Controllers\ProductController;
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

Route::middleware(['splade'])->group(function () {
    Route::get('/', fn () => view('home'))->name('home');
    Route::resource('/products', ProductController::class);

    Route::get('/dashboard', [ProductController::class, 'index']);


    Route::get('/shopping-cart', [ProductController::class, 'productCart'])->name('shopping.cart');
    Route::get('/add-to-cart/{id}', [ProductController::class, 'addProducttoCart'])->name('addProduct.to.cart');
    Route::patch('/update-cart', [ProductController::class, 'updateCart'])->name('update.cart');
    Route::delete('/remove-from-cart', [ProductController::class, 'deleteProduct'])->name('delete.cart.product');
    Route::get('/cart-count', [CartCountController::class, 'index'])->name('cart.count');


    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();
});
