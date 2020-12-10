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


Route::get('/create1', function () {
    return view('admin.category.create');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::group(['prefix'=>'store'],function(){
    Route::get('/',[App\Http\Controllers\StoreController::class, 'index'])->name('admin.store');

    Route::get('/create',[App\Http\Controllers\StoreController::class, 'create'])->name('admin.store.create');
    Route::post('store',[App\Http\Controllers\StoreController::class, 'store'])->name('admin.store.store');

});

Route::group(['prefix'=>'category'],function(){
    Route::get('/',[App\Http\Controllers\CategoryController::class, 'index'])->name('admin.category');

    Route::get('/create',[App\Http\Controllers\CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('store',[App\Http\Controllers\CategoryController::class, 'store'])->name('admin.category.store');

});

Route::group(['prefix'=>'product'],function(){
    Route::get('/',[App\Http\Controllers\ProductController::class, 'index'])->name('admin.product');

    Route::get('/create',[App\Http\Controllers\ProductController::class, 'create'])->name('admin.product.create');
    Route::post('store',[App\Http\Controllers\ProductController::class, 'store'])->name('admin.product.store');

});
