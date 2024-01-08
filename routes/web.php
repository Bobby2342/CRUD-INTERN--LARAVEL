<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ContactController;
use App\Models\Cart;

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

Route::get('/a', function () {
    dd('ok');
});
Route::get('/',[ProductController::class , 'slideProduct'])->name('slideProduct');


Route::get('product',[ProductController::class , 'viewProduct'])->name('viewProduct');
Route::get('pdetails/{id}',[ProductController::class , 'productDetails'])->name('productDetails');


Route::get('/upload',[ProductController::class , 'showForm'])->name('showForm');
Route::post('/upload',[ProductController::class , 'submitForm'])->name('submitForm');



Route::get('/products/{id}/edit', [ProductController::class, 'editProductForm'])->name('editProductForm');

Route::put('/editProduct/{id}',[ProductController::class , 'editProduct'])->name('editProduct');

Route::delete('/deleteProduct/{id}', [ProductController::class, 'deleteProduct'])->name('deleteProduct');

Route::get('/search', [ProductController::class, 'searchProduct'])->name('searchProduct');

Route::get('/login', [UserController::class, 'loginView'])->name('login');
Route::post('/login', [UserController::class, 'submitLogin'])->name('submitLogin');
Route::get('/signup', [UserController::class, 'signupView'])->name('signup');
Route::post('/signup', [UserController::class, 'submitSignup'])->name('submitSignup');
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('redirectToGoogle');
Route::get('/auth/google/callback',[GoogleController::class,'handleGoogleCallback'])->name('handleGoogleCallback');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/mobiles', [CategoriesController::class, 'showMobileProducts'])->name('mobiles');
Route::get('/music', [CategoriesController::class, 'showMusicProducts'])->name('music');
Route::get('/category', [CategoriesController::class, 'viewCategory'])->name('viewCategory');
Route::post('/category', [CategoriesController::class, 'createCategory'])->name('createCategory');

Route::get('/viewcategory', [CategoriesController::class, 'fetchCategory'])->name('fetchCategory');
Route::get('/editcategory/{id}', [CategoriesController::class, 'viewedit'])->name('viewedit');
Route::put('/editcategory/{id}', [CategoriesController::class, 'updateCategory'])->name('updateCategory');
Route::delete('/deletecategory/{id}', [CategoriesController::class, 'delCategory'])->name('delCategory');

Route::get('/header', [CategoriesController::class, 'showCategory'])->name('showCategory');
Route::get('/upload', [CategoriesController::class, 'dropdown'])->name('dropdown');
Route::get('/edit', [CategoriesController::class, 'dropdownEdit'])->name('dropdownEdit');
Route::get('/mobile', [CategoriesController::class, 'showProduct'])->name('showProduct');
Route::get('/fetchcat/{categoryid}', [ProductController::class, 'fetchCat'])->name('fetchCat');

//cart routes

Route::get('/cart', [CartController::class, 'viewCart'])->name('viewCart');

Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('addToCart');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');


//contact us
Route::get('/contact', [ContactController::class, 'showContact'])->name('showContact');
Route::post('/contact', [ContactController::class, 'submitContact'])->name('submitContact');














