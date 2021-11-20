<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SanphamController;

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


Route::get('/', [PageController::class, 'trangchu']);
// Đăng nhập / đăng xuất
Route::get('/dangnhap', [UserController::class, 'trangdangnhap'])->name('login');
Route::post('/dangnhap', [UserController::class, 'xulydangnhap']);
Route::get('/dangxuat', [UserController::class, 'xulydangxuat']);
Route::get('/sanpham/{id}/themvaogiohang', [SanphamController::class, 'themvaogiohang']);
Route::get('/sanpham/{id}/giamsoluong', [SanphamController::class, 'giamsoluong']);
Route::get('/sanpham/{id}/xoagiohang', [SanphamController::class, 'xoagiohang']);

// Trang quản lý
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('', [PageController::class, 'thongke']);

    Route::get('nhacungcap/danhsach', [SupplierController::class, 'danhsach']);
    Route::get('nhacungcap/tao', [SupplierController::class, 'tao']);
    Route::post('nhacungcap/tao', [SupplierController::class, 'luu']);
    Route::get('nhacungcap/{id}/sua', [SupplierController::class, 'sua']);
    Route::put('nhacungcap/{id}/sua', [SupplierController::class, 'capnhat']);
    Route::delete('nhacungcap/{id}', [SupplierController::class, 'xoa']);

    Route::get('sanpham/danhsach', [ProductController::class, 'danhsach']);
    Route::get('sanpham/tao', [ProductController::class, 'tao']);
    Route::post('sanpham/tao', [ProductController::class, 'luu']);
    Route::get('sanpham/{id}/sua', [ProductController::class, 'sua']);
    Route::put('sanpham/{id}/sua', [ProductController::class, 'capnhat']);
    Route::delete('sanpham/{id}', [ProductController::class, 'xoa']);

});