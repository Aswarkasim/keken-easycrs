<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminBannerController;
use App\Http\Controllers\AdminCategoryPostController;
use App\Http\Controllers\AdminConfigurationController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminGaleriController;
use App\Http\Controllers\AdminKelasController;
use App\Http\Controllers\AdminLowonganController;
use App\Http\Controllers\AdminPengajarController;
use App\Http\Controllers\AdminPesertaController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminSaranController;
use App\Http\Controllers\HomeArtikelController;
use App\Http\Controllers\HomeKelasController;
use App\Http\Controllers\HomeLowonganController;

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

Route::get('/', [HomeController::class, 'index']);



Route::prefix('/admin/auth')->group(function () {
    Route::get('/', [AdminAuthController::class, 'index'])->middleware('guest')->name('login');
    Route::post('/login', [AdminAuthController::class, 'login']);

    Route::get('/register', [AdminAuthController::class, 'register']);
    Route::post('/doRegister', [AdminAuthController::class, 'doRegsiter']);
    Route::get('/logout', [AdminAuthController::class, 'logout']);
});


Route::prefix('/admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index']);

    Route::resource('/user', AdminUserController::class);

    Route::get('/profile', [AdminProfileController::class, 'index']);
    Route::put('/profile/update', [AdminProfileController::class, 'update']);

    Route::get('/konfigurasi', [AdminConfigurationController::class, 'index']);
    Route::put('/konfigurasi/update', [AdminConfigurationController::class, 'update']);

    Route::resource('/peserta', AdminPesertaController::class);
    Route::resource('/pengajar', AdminPengajarController::class);
    Route::resource('/galeri', AdminGaleriController::class);
    Route::resource('/kelas', AdminKelasController::class);
    Route::resource('/lowongan', AdminLowonganController::class);
    Route::resource('/banner', AdminBannerController::class);


    Route::get('/saran', [AdminSaranController::class, 'index']);
    Route::get('/saran/show/{id}', [AdminSaranController::class, 'detail']);
    Route::get('/saran/delete/{id}', [AdminSaranController::class, 'delete']);



    Route::prefix('/posts')->group(function () {
        Route::resource('/post', AdminPostController::class);
        Route::resource('/kategori', AdminCategoryPostController::class);
    });
});



Route::get('/artikel', [HomeArtikelController::class, 'index']);
Route::get('/artikel/show/{id}', [HomeArtikelController::class, 'show']);


Route::get('/profile', [HomeController::class, 'profile']);
Route::get('/galeri', [HomeController::class, 'galeri']);

Route::get('/kelas', [HomeKelasController::class, 'index']);
Route::get('/kelas/show/{id}', [HomeKelasController::class, 'show']);

Route::get('/lowongan', [HomeLowonganController::class, 'index']);
Route::get('/lowongan/show/{id}', [HomeLowonganController::class, 'show']);

Route::get('/contact', [HomeController::class, 'contact']);
Route::post('/contact/send', [HomeController::class, 'sendSaran']);
