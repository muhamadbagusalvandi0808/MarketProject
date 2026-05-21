<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});


Route::get('/login',[AuthController::class, 'showLogin'])->name('login');
Route::post('/login',[AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout',[AuthController::class,'logout'])->name('logout');

Route::get('/admin/reports/sales',[AdminController::class, 'salesReport'])->name('admin.sales');

Route::resource("/products", ProductController::class);

Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');