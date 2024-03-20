<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
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

Route::get('/', [TransactionController::class, 'index'])->name('home');
Route::post('/addToCart', [TransactionController::class, 'addToCart'])->name('addToCart');


Route::get('/shop', [Controller::class, 'shop'])->name('shop');
Route::get('/transaksi', [Controller::class, 'transaksi'])->name('transaksi');
Route::get('/contacts', [Controller::class, 'contact'])->name('contacts');

Route::get('/checkout', [Controller::class, 'checkout'])->name('checkout');
Route::post('/checkout/proses/{id}', [Controller::class, 'prosesCheckout'])->name('checkout.product');
Route::post('/bayar', [Controller::class, 'bayarSekarang'])->name('bayar');

Route::get('/keranjang', [Controller::class, 'keranjang'])->name('keranjang');
Route::get('/keranjang/{id}', [Controller::class, 'keranjangBayar'])->name('keranjang.bayar');
Route::get('/keranjang/{id}', [Controller::class, 'keranjangBayar'])->name('keranjang.bayar');

Route::get('/admin', [Controller::class, 'login'])->name('login');
Route::post('/admin/loginProses', [Controller::class, 'loginProses'])->name('loginProses');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/logout', [Controller::class, 'logout'])->name('logout');
    Route::get('/admin/dashboard', [Controller::class, 'admin'])->name('dashboard');
    Route::get('/admin/report', [Controller::class, 'report'])->name('report');

    Route::get('/admin/user-management', [UserController::class, 'index'])->name('userManagement');
    Route::get('/admin/addModalUser', [UserController::class, 'addModal'])->name('addModalUser');
    Route::post('/admin/addDataUser', [UserController::class, 'store'])->name('addDataUser');
    Route::get('/admin/editUser/{id}', [UserController::class, 'show'])->name('editUser');
    Route::put('/admin/updateDataUser/{id}', [UserController::class, 'update'])->name('updateDataUser');
    Route::delete('/admin/deleteUser/{id}', [UserController::class, 'destroy'])->name('deleteUser');


    Route::get('/admin/product', [ProductController::class, 'index'])->name('product');
    Route::get('/admin/addModal', [ProductController::class, 'addModal'])->name('addModal');
    Route::post('/admin/addData', [ProductController::class, 'store'])->name('addData');
    Route::get('/admin/editModal/{id}', [ProductController::class, 'show'])->name('editModal');
    Route::put('/admin/updateData/{id}', [ProductController::class, 'update'])->name('updateData');
    Route::delete('/admin/deleteData/{id}', [ProductController::class, 'destroy'])->name('deleteData');
});
