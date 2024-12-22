<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\authController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('guest.layout.index');
// });

Route::get('/',[GuestController::class, 'index'])->name('dashboard');

Route::middleware('guest')->group(function(){
    Route::get('/login',[authController::class, 'login'])->name('login');
    Route::post('/login/submit',[authController::class, 'submitLogin'])->name('submitLogin');
    
    Route::get('/login/register',[authController::class, 'register'])->name('register');
    Route::post('/login/register/submit',[authController::class, 'submitRegister'])->name('submitRegister');
});

Route::middleware('auth')->group(function(){
    Route::get('/logout',[authController::class, 'logout'])->name('logout');
    Route::get('/admin',[adminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/pegawai',[adminController::class, 'pegawai'])->name('admin.pegawai');

    Route::get('/admin/pegawai/addJabatan',[adminController::class, 'addJabatan'])->name('admin.addJabatan');
    Route::post('/admin/pegawai/addJabatan/addData',[adminController::class, 'addDataJabatan'])->name('admin.addDataJabatan');
});

