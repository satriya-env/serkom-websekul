<?php

use App\Http\Controllers\siswaController;
use Illuminate\Support\Facades\Route;

// ADMIN SIDE
    // DASHBOARD
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // MENU USER
    Route::get('/user', function() {
        return view('admin.user');
    })->name('user');

    // DATA SISWA
    Route::resource('siswa', siswaController::class);