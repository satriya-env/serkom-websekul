<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Eskul;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    //
    public function index(){
        // VARIABLE TOTAL DATA
        $totalUser = User::count();
        $totalSiswa = Siswa::count();
        $totalGuru = Guru::count();
        $totalBerita = Berita::count();
        $totalEskul = Eskul::count();

        // VARIABLE 'BARU DITAMBAHKAN'
            // BERITA
            $berita = Berita::latest()->take(5)->get();
            // TABEL USER
            $user = User::latest()->take(5)->get()->map(function ($item){
                $item->type = 'Data User';
                $item->route = route('user.index');
                return $item;
            });
            // TABEL SISWA
            $siswa = Siswa::latest()->take(5)->get()->map(function ($item){
                $item->type = 'Data Siswa';
                $item->route = route('siswa.index');
                return $item;
            });
            // TABEL GURU
            $guru = Guru::latest()->take(5)->get()->map(function ($item){
                $item->type = 'Data Guru';
                $item->route = route('guru.index');
                return $item;
            });
            // TABEL ESKUL
            $eskul = Eskul::latest()->take(5)->get()->map(function ($item){
                $item->type = 'Ekstrakulikuler';
                $item->route = route('eskul.index');
                return $item;
            });

        $recent =  $user->concat($siswa)
                        ->concat($guru)
                        ->concat($user)
                        ->concat($eskul)
                        ->sortByDesc('updated_at')
                        ->take(5);

        // DATA YANG DITAMPILKAN DI DASHBOARD
        return view(
            'admin.dashboard', 
            compact(
                'totalUser', 
                'totalSiswa', 
                'totalGuru', 
                'totalBerita',
                'totalEskul',
                'berita',
                'recent',
            ));
    }
}
