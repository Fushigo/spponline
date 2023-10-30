<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\navController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\entriController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PembayaranSiswaController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\SppController;
use App\Models\Pembayaran;
use App\Models\Spp;

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

// Navigation Route
Route::get("/", [navController::class, "Home"]);
Route::get("/petugas/login", [navController::class, "petugasLogin"])->name('login');
Route::get("/siswa/login", [navController::class, "siswaLogin"]);
Route::get("/register", [navController::class, "Register"]);

// Login Siswa
Route::post("/siswa/login", [LoginController::class, "login"]);

Route::get("/siswa/dashboard", [DashboardController::class, "siswaIndex"]);
Route::resource('/admin/dashboard/pembayaran/siswa', PembayaranSiswaController::class);
Route::get('/admin/dashboard/pembayaran/siswa/history', [PembayaranSiswaController::class, "history"]);
Route::resource('/admin/dashboard/pembayaran/siswa/delete/{$id}', PembayaranSiswaController::class);
Route::resource('/admin/dashboard/pembayaran/siswa/{$id}', PembayaranSiswaController::class);

Route::get("/siswa/updatePembayaran/{id}", [PembayaranSiswaController::class, 'updatePembayaran'])->name('siswa.updatePembayaran');

// Login Petugas
Route::post("/petugas/login", [LoginController::class, "loginPetugas"]);

//Group Routes
Route::group(['middleware' => ['authWeb']], function () {

    // Masuk ke dashboard
    Route::get("/admin/dashboard", [DashboardController::class, "index"]);
    Route::get("/petugas/dashboard", [DashboardController::class, "petugasIndex"]);

    // Mengelola Resource
    Route::resource("/admin/dashboard/datasiswa", SiswaController::class);
    Route::resource("/admin/dashboard/datapetugas", PetugasController::class);
    Route::resource("/admin/dashboard/dataadmin", AdminController::class);
    Route::resource("/admin/dashboard/datakelas", KelasController::class);
    Route::resource('/admin/dashboard/dataspp', SppController::class);
    Route::resource('/admin/dashboard/pembayaran', PembayaranController::class);
    Route::get('/admin/dashboard/pembayaran/admin/history', [PembayaranController::class, "history"]);
    Route::get('/admin/dashboard/datapetugas/{id}/edit', [PetugasController::class, 'edit']);
    Route::get('/generate/laporan', [PembayaranController::class, 'laporan']);
});

//Log Out
Route::post("/logout", [loginController::class, "logout"]);

Route::get('/getIdSpp/{id}', [SppController::class, 'getIdSpp']);
