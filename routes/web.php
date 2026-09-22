<?php

use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

// ADMIN SIDE
    // DASHBOARD
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // DATA SISWA
    Route::get('/siswa', [userController::class, 'index'])->name('siswa');
    Route::get('/form', function () {
        return view('formsiswa');
    })->name('formsiswa');
    
