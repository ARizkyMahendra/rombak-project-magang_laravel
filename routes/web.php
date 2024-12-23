<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\authController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\PegawaiController;
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
    
    Route::get('/admin/pegawai',[PegawaiController::class, 'pegawai'])->name('admin.pegawai');

    Route::get('/admin/pegawai/addJabatan',[PegawaiController::class, 'addJabatan'])->name('admin.addJabatan');
    Route::post('/admin/pegawai/addJabatan/addData',[PegawaiController::class, 'addDataJabatan'])->name('admin.addDataJabatan');
    Route::get('/admin/pegawai/editData/{id}',[PegawaiController::class, 'editJabatan'])->name('admin.editJabatan');
    Route::put('/admin/pegawai/editData/updateData/{id}',[PegawaiController::class, 'updateJabatan'])->name('admin.updateJabatan');
    Route::delete('/admin/pegawai/DeleteData/{id}',[PegawaiController::class, 'deleteJabatan'])->name('admin.deleteJabatan');

    Route::get('/admin/pegawai/addPejabat',[PegawaiController::class, 'addPejabat'])->name('admin.addPejabat');
    Route::post('/admin/pegawai/addPejabat/addData',[PegawaiController::class, 'addDataPejabat'])->name('admin.addDataPejabat');
    Route::get('/admin/pegawai/editDataPejabat/{id}',[PegawaiController::class, 'editPejabat'])->name('admin.editPejabat');
    Route::put('/admin/pegawai/editData/updateDataPejabat/{id}',[PegawaiController::class, 'updatePejabat'])->name('admin.updatePejabat');
    Route::delete('/admin/pegawai/DeleteDataPejabat/{id}',[PegawaiController::class, 'deletePejabat'])->name('admin.deletePejabat');
});

