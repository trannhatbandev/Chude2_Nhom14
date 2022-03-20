<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\ThuongHieuController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MauSacController;
use App\Http\Controllers\SizeController;

//frontend
Route::get('/', [HomeController::class, 'index']);
Route::get('/trang-chu', [HomeController::class, 'index']);
Route::get('/danh-muc-con/{slug}', [HomeController::class, 'danhMucCon']);
Route::get('/thuong-hieu/{slug}', [HomeController::class, 'showBrand']);
Route::get('/san-pham/{slug}', [HomeController::class, 'showProductDetail']);

//customer
Route::post('/khach-hang-dang-ky', [CustomerController::class, 'customerRegister']);
Route::post('/khach-hang-dang-nhap', [CustomerController::class, 'customerLogin']);
Route::get('/dang-xuat', [CustomerController::class, 'customerLogout']);
Route::get('/show-dang-nhap', [HomeController::class, 'showDangNhap']);
Route::get('/show-dang-ky', [HomeController::class, 'showDangKy']);

//cart
Route::post('/save-cart', [CartController::class, 'saveCart']);
Route::get('/show-cart', [CartController::class, 'showCart']);
Route::get('/delete-cart/{rowId}',[CartController::class, 'deleteCart']);
Route::post('/update-cart', [CartController::class, 'updateCart']);

//search
Route::post('/search-product', [HomeController::class, 'searchProduct']);

//contact
Route::get('/lien-he',[HomeController::class,'contact']);



//backend
Route::middleware(['auth'])->group(function () {
    
    Route::get('/dashboard', [AdminController::class, 'show_dashboard'])->name('dashboard');
    Route::get('/dang-xuat-admin', [AdminController::class, 'logOut']);
    
    });
    
Route::get('/admin', [AdminController::class, 'index'])->name('login');
Route::post('/admin-dashboard', [AdminController::class, 'adminLogin']);

Route::resource('/danhmuc',DanhMucController::class);
Route::resource('/sanpham',SanPhamController::class);
Route::resource('/thuonghieu',ThuongHieuController::class);
Route::resource('/mausac',MauSacController::class);
Route::resource('/size',SizeController::class);

//update-status
Route::get('/update-brand-status-an/{id}',[HomeController::class, 'updateBrandStatusAn']);
Route::get('/update-brand-status-hienthi/{id}',[HomeController::class, 'updateBrandStatusHienThi']);
Route::get('/update-category-status-an/{id}',[HomeController::class, 'updateCategoryStatusAn']);
Route::get('/update-category-status-hienthi/{id}',[HomeController::class, 'updatecategoryStatusHienThi']);
Route::get('/update-product-status-an/{id}',[HomeController::class, 'updateProductStatusAn']);
Route::get('/update-product-status-hienthi/{id}',[HomeController::class, 'updateProductStatusHienThi']);
Route::get('/update-color-status-an/{id}',[HomeController::class, 'updateColorStatusAn']);
Route::get('/update-color-status-hienthi/{id}',[HomeController::class, 'updateColorStatusHienThi']);
Route::get('/update-size-status-an/{id}',[HomeController::class, 'updateSizeStatusAn']);
Route::get('/update-size-status-hienthi/{id}',[HomeController::class, 'updateSizeStatusHienThi']);



