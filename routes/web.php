<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use Gloudemans\Shoppingcart\Facades\Cart;

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

// Route::resource('cart', CartController::class);

Route::group([], function () {

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::put('/cart/{id}/increment', [CartController::class, 'itemIncrement'])->name('cart.itemIncrement');
    Route::put('/cart/{id}/decrement', [CartController::class, 'itemDecrement'])->name('cart.itemDecrement');
});

Route::put('/hello/update/{id}/{increment}/', [CartController::class, 'increment'])->name('cart.updateProduct');

Route::get('destroy', function () {

    Cart::destroy();
});


Route::view('/', 'front-end.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';