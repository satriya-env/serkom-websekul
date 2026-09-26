<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\galeriController;
use App\Http\Controllers\guruController;
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
            Route::get('/', [dashboardController::class, 'index'])->name('dashboard');

        // MENU  DATA USER
            //READ
            Route::get('/user', [userController::class, 'index'])->name('user.index');

            //CREATE
            Route::get('/user/create', [userController::class, 'create'])->name('user.create');
            Route::post('/user', [userController::class, 'store'])->name('user.store');

            //UPDATE
            Route::get('/user/edit/{id}', [userController::class, 'edit'])->name('user.edit');
            Route::put('/user/update/{id}', [userController::class, 'update'])->name('user.update');

            //DELETE
            Route::get('/user/delete/{id}', [userController::class, 'delete'])->name('user.delete');

        // PROFIL SEKOLAH
            //PAGE (READ)
            Route::get('/profil', [profilController::class, 'index'])->name('profil.index');
            
            //UPDATE
            Route::get('/profil/form', [profilController::class, 'edit'])->name('profil.form');
            Route::put('/profil/update', [profilController::class, 'update'])->name('profil.update');

        // SISWA
            //READ
            Route::get('/siswa', [siswaController::class, 'index'])->name('siswa.index');

            // CREATE
            Route::get('/siswa/create', [siswaController::class, 'create'])->name('siswa.create');
            Route::post('/siswa', [siswaController::class, 'store'])->name('siswa.store');

            //UPDATE
            Route::get('/siswa/edit/{id}', [siswaController::class, 'edit'])->name('siswa.edit');
            Route::put('/siswa/update/{id}', [siswaController::class, 'update'])->name('siswa.update');

            //DELETE
            Route::get('/siswa/delete/{id}', [siswaController::class, 'delete'])->name('siswa.delete');
        
        // GURU
            //READ
            Route::get('/guru', [guruController::class, 'index'])->name('guru.index');

            // CREATE
            Route::get('/guru/create', [guruController::class, 'create'])->name('guru.create');
            Route::post('/guru', [guruController::class, 'store'])->name('guru.store');

            //UPDATE
            Route::get('/guru/edit/{id}', [guruController::class, 'edit'])->name('guru.edit');
            Route::put('/guru/update/{id}', [guruController::class, 'update'])->name('guru.update');

            //DELETE
            Route::get('/guru/delete/{id}', [guruController::class, 'delete'])->name('guru.delete');

        // GALERI
            // READ
            Route::get('/galeri', [galeriController::class, 'index'])->name('galeri.index');

            // CREATE
            Route::get('/galeri/create', [galeriController::class, 'create'])->name('galeri.create');
            Route::post('/galeri/', [galeriController::class, 'store'])->name('galeri.store');

            //UPDATE
            Route::get('/galeri/edit/{id}', [galeriController::class, 'edit'])->name('galeri.edit');
            Route::put('/galeri/update/{id}', [galeriController::class, 'update'])->name('galeri.update');

            // DELETE
            Route::get('/galeri/delete/{id}', [galeriController::class, 'delete'])->name('galeri.delete');

        // BERITA
            // READ (INDEX)
            Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');

            // CREATE
            Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
            Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');

            // UPDATE
            Route::get('/berita/edit/{id}', [BeritaController::class, 'edit'])->name('berita.edit');
            Route::put('/berita/update/{id}', [BeritaController::class, 'update'])->name('berita.update');

            // DELETE
            Route::get('/berita/delete/{id}', [BeritaController::class, 'delete'])->name('berita.delete'); 
    });

        