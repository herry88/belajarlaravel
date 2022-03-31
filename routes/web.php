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

Route::get('/', function () {
    return view('welcome');
});

//buat rute baru
Route::get('/hello', function () {
    return 'Hello World!';
});

//rute logiin setiap halaman
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::resource('product', \App\Http\Controllers\ProductController::class)->middleware('auth');
    Route::get('product/destroy/{id}', [\App\Http\Controllers\ProductController::class, 'destroy'])->name('product.destroy')->middleware('auth');
});

//kasir
Route::group(['prefix' => 'kasir', 'middleware' => 'kasir'], function () {
    Route::resource('unit', \App\Http\Controllers\UnitController::class)->middleware('auth');
});


// Route::group(['middleware' => 'auth'], function () {
//     //halaman product
//     // Route::resource('product', \App\Http\Controllers\ProductController::class);
//     // Route::get('product/destroy/{id}', [\App\Http\Controllers\ProductController::class, 'destroy'])->name('product.destroy');

//     //halaman unit
//     Route::resource('unit', \App\Http\Controllers\UnitController::class);
// });

// Route::resource('product', \App\Http\Controllers\ProductController::class)->middleware('auth');
// Route::get('product/destroy/{id}', [\App\Http\Controllers\ProductController::class, 'destroy'])->name('product.destroy')->middleware('auth');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
