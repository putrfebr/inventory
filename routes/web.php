<?php

use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//master-data/produk
Route::middleware('auth')->group(function(){
    Route::prefix('master-data')->name('master-data.')->group(function(){
        Route::resource('kategori-produk', KategoriProdukController::class);
    });
});

Route::post('/produk/{id}/tambah-stock', [ProductController::class, 'tambahStock']);
Route::post('/produk/{id}/kurang-stock', [ProductController::class, 'kurangStock']);