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

//rute dengan parameter
// Route::get('/product/{namaproduct}', function ($namaproduct) {
//     return '<h1>Ini adalah :</h1> '.$namaproduct;
// });

//rute product dari controller
Route::resource('product',\App\Http\Controllers\ProductController::class);
