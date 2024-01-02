<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/a', function () {
    dd('ok');
});
Route::get('product',[ProductController::class , 'viewProduct'])->name('viewProduct');


Route::get('/upload',[ProductController::class , 'showForm'])->name('showForm');
Route::post('/upload',[ProductController::class , 'submitForm'])->name('submitForm');

Route::get('/cart',[ProductController::class , 'viewCart'])->name('viewCart');

Route::post('/add-to-cart',[ProductController::class,'addToCart'])->name('addToCart');

Route::put('/cart/{id}',[ProductController::class , 'update'])->name('updateCart');
Route::delete('/cart/{id}', [ProductController::class, 'delete'])->name('deleteCart');

Route::get('/products/{id}/edit', [ProductController::class, 'editProductForm'])->name('editProductForm');

Route::put('/editProduct/{id}',[ProductController::class , 'editProduct'])->name('editProduct');

Route::delete('/deleteProduct/{id}', [ProductController::class, 'deleteProduct'])->name('deleteProduct');

Route::get('/search', [ProductController::class, 'searchProduct'])->name('searchProduct');





