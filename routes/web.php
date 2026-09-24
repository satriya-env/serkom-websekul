<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\profilController;
use App\Http\Controllers\siswaController;
use App\Http\Controllers\userController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

// ADMIN SIDE
    // LOGIN
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'pageLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login']);
    });

    Route::middleware('auth')->group(function(){
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        // DASHBOARD
        Route::get('/', fn() => view('admin.dashboard'))->name('dashboard');

        // MENU  DATA USER
            //READ
            Route::get('/user', [userController::class, 'index'])->name('user.index');

            //CREATE
            Route::get('/user/create', [userController::class, 'create'])->name('user.create');
            Route::post('/user', [userController::class, 'store'])->name('user.store');

            //EDIT
            Route::get('/user/edit/{id}', [userController::class, 'edit'])->name('user.edit');
            Route::get('/user/update/{id}', [userController::class, 'update'])->name('user.update');

            //DELETE
            Route::get('/user/delete/{id}', [userController::class, 'delete'])->name('user.delete');

        // PROFIL SEKOLAH
        Route::get('/profil', [profilController::class, 'index'])->name('profil.index');
    });

        