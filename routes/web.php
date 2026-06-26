<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminNewsController;
use App\Http\Controllers\AdminServiceController;

// ==========================================
// RUTE PENGGUNA UMUM / VISITOR
// ==========================================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/services/{id}', [HomeController::class, 'serviceDetail'])->name('services.detail');
Route::get('/tracking', [HomeController::class, 'tracking'])->name('tracking');
Route::get('/tarif', [HomeController::class, 'tarif'])->name('tarif');

Route::get('/news', [HomeController::class, 'news'])->name('news');
Route::get('/news/{id}', [HomeController::class, 'newsDetail'])->name('news.detail');


// ==========================================
// RUTE AUTENTIKASI ADMIN
// ==========================================
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('login.submit');


// ==========================================
// RUTE KHUSUS ADMIN (Wajib Login)
// ==========================================
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('/admin/news', AdminNewsController::class, ['as' => 'admin']);
    Route::resource('/admin/services', AdminServiceController::class, ['as' => 'admin']);
});