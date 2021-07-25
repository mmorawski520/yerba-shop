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
//--- General Routes
Route::get('/', function () {
    return view('welcome');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('admin/cms', function () {
    return view('adminDashboard.cms');
});
//--- Payment

Route::get('/payment',[App\Http\Controllers\PaymentController::class,'index']);
Route::post('/payment',[App\Http\Controllers\PaymentController::class,'payment']);
Auth::routes();
//--- Admin dashboard
Route::get('/admin',[App\Http\Controllers\AdminDashboardController::class,'index'])->name('admin.dashboard');
Route::get('/admin/productList',[App\Http\Controllers\AdminDashboardController::class,'productList'])->name('admin.productList');
//Route::get('/admin/',[App\Http\Controllers\AdminDashboardController::class,'productList'])->name('admin.productList');
Route::get('/admin/orders',[App\Http\Controllers\AdminDashboardController::class,'orders'])->name('admin.orders');
Route::get('/admin/userList',[App\Http\Controllers\AdminDashboardController::class,'userList'])->name('admin.userList');
//--- Home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//--- Settings
Route::get('/settings',[App\Http\Controllers\SettingsController::class,'index']);
//--- Shop Routes
Route::get('/shop', [App\Http\Controllers\ShopController::class, 'index'])->name('shop');
//--- Product Routes
Route::get('/product/{id}', [App\Http\Controllers\ProductController::class,'index'])->name('current.product');
Route::post('/product', [App\Http\Controllers\ProductController::class,'add'])
    ->name('add.product')
    ->middleware("auth");
Route::put('/product', [App\Http\Controllers\ProductController::class,'edit'])
    ->name('edit.product')
    ->middleware("auth");
Route::delete('/product/{id}', [App\Http\Controllers\ProductController::class,'delete'])->name('delete.product');
//--- Cart Controller
Route::get('/cart', [App\Http\Controllers\CartController::class,'index'])->name('current.cart');
Route::post('/cart', [App\Http\Controllers\CartController::class,'add'])->name('add.item');
//btw it's not deleting a cart it's just deleting a category
Route::delete('/cart/{id}', [App\Http\Controllers\CartController::class,'deleteItem'])->name('delete.item');
Route::patch('/cart', [App\Http\Controllers\CartController::class,'editItem'])->name('edit.item');
//--- Another Routes
Route::delete('/user/{email}', [App\Http\Controllers\AdminDashboardController::class,'deleteUser'])->name('delete.user');
Route::get('/order/{id}',[App\Http\Controllers\PaymentController::class,'get']);
Route::get('/details/{id}',[App\Http\Controllers\PaymentController::class,'details']);
Route::patch('order',[App\Http\Controllers\PaymentController::class,'changeStatus']);
//--- Edit cms
Route::post('cms/main',[App\Http\Controllers\CmsController::class,'editMain']);
Route::post('cms/main',[App\Http\Controllers\CmsController::class,'editShop']);
Route::post('cms/main',[App\Http\Controllers\CmsController::class,'editAbout']);

