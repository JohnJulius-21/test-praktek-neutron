<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

route::get('/',[ProductController::class,'index'])->name('produk');
route::get('/produk/tambahProduk',[ProductController::class,'create'])->name('tambahProduk');
route::post('/produk/simpanProduk',[ProductController::class,'store'])->name('simpanProduk');
route::get('/produk/editProduk/{id_produk}',[ProductController::class, 'edit'])->name('editProduk');
route::put('/updateProduk/{id_produk}',[ProductController::class, 'update'])->name('updateProduk');
route::delete('/hapusProduk/{id}',[ProductController::class, 'destroy'])->name('hapusProduk');



route::get('/pelanggan',[CustomerController::class,'index'])->name('pelanggan');
route::get('/pelanggan/tambahPelanggan',[CustomerController::class,'create'])->name('tambahPelanggan');
route::post('/pelanggan/simpanPelanggan',[CustomerController::class,'store'])->name('simpanPelanggan');
route::get('/pelanggan/editPelanggan/{id_pelanggan}',[CustomerController::class, 'edit'])->name('editPelanggan');
route::put('/updatePelanggan/{id_pelanggan}',[CustomerController::class, 'update'])->name('updatePelanggan');
route::delete('/hapusPelanggan/{id}',[CustomerController::class, 'destroy'])->name('hapusPelanggan');

route::get('/penjualan',[SaleController::class,'index'])->name('penjualan');
route::get('/penjualan/tambahpenjualan',[SaleController::class,'create'])->name('tambahPenjualan');
route::post('/penjualan/simpanpenjualan',[SaleController::class,'store'])->name('simpanPenjualan');