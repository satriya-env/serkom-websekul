<?php

use Illuminate\Support\Facades\Route;
// CONTROLLER USED
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\BeritaController;
    use App\Http\Controllers\dashboardController;
    use App\Http\Controllers\eskulController;
    use App\Http\Controllers\galeriController;
    use App\Http\Controllers\guruController;
    use App\Http\Controllers\publicController;
    use App\Http\Controllers\jurusanController;
    use App\Http\Controllers\profilController;
    use App\Http\Controllers\siswaController;
    use App\Http\Controllers\userController;
// MODEL USED
    use App\Models\Eskul;
    use App\Models\Galeri;

// PUBLIC PAGE
    // TEMP (MASTER LAYOUT)
    Route::get('/templatePublic', [publicController::class, 'index']);
    // HOME
    Route::get('/', [publicController::class, 'index'])->name('public.home');
    // PROFIL
    Route::get('/profilsekolah', [publicController::class, 'profil'])->name('public.profil');
    // GURU
    Route::get('/daftarguru', [publicController::class, 'guru'])->name('public.guru');
    // BERITA
    Route::get('/artikel', [publicController::class, 'berita'])->name('public.berita');
    Route::get('/artikel/{slug}', [publicController::class, 'detail'])->name('detail.berita');
    // JURUSAN
    Route::get('/program-keahlian',[publicController::class, 'jurusan'])->name('public.jurusan');

Route::get('/ekstrakulikuler', fn() => view('public.eskul', ['data' => Eskul::all()]))->name('public.eskul');
Route::get('/galerisekolah', fn() => view('public.galeri', ['galeri' => Galeri::all()]))->name('public.galeri');

// GUEST ROUTES (LOGIN)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'pageLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// AUTHENTICATED ROUTES (ADMIN SIDE)
Route::middleware('auth')->group(function () {
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');

    // PROFIL
    Route::get('/profil', [profilController::class, 'index'])->name('profil.index');
    Route::put('/profil', [profilController::class, 'update'])->name('profil.update');

    // USER
    Route::resource('user', userController::class)->except(['show', 'destroy']);
    Route::get('/user/delete/{id}', [userController::class, 'delete'])->name('user.delete');

    // SISWA
    Route::resource('siswa', siswaController::class)->except(['show', 'destroy']);
    Route::get('/siswa/delete/{id}', [siswaController::class, 'delete'])->name('siswa.delete');

    // GURU
    Route::resource('guru', guruController::class)->except(['show', 'destroy']);
    Route::get('/guru/delete/{id}', [guruController::class, 'delete'])->name('guru.delete');

    // GALERI
    Route::resource('galeri', galeriController::class)->except(['show', 'destroy']);
    Route::get('/galeri/delete/{id}', [galeriController::class, 'delete'])->name('galeri.delete');

    // BERITA
    Route::resource('berita', BeritaController::class)->except(['show', 'destroy']);
    Route::get('/berita/delete/{id}', [BeritaController::class, 'delete'])->name('berita.delete');

    // ESKUL
    Route::resource('eskul', eskulController::class)->except(['destroy']);
    Route::get('/eskul/delete/{id}', [eskulController::class, 'delete'])->name('eskul.delete');

    // JURUSAN
    Route::resource('jurusan', jurusanController::class)->except(['destroy']);
    Route::get('/jurusan/delete/{id}', [jurusanController::class, 'delete'])->name('jurusan.delete');
});