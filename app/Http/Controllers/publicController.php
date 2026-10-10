<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Eskul;
use App\Models\Guru;
use App\Models\jurusan;
use App\Models\Profil;
use App\Models\Siswa;
use App\Models\sosmed;
use Illuminate\Http\Request;

class publicController extends Controller
{
    //
    public function index(Request $request)
    {
        $berita = Berita::where('status', 'Publish')
                    ->orderBy('tanggal', 'desc')
                    ->take(3)->get();
        $guru = Guru::latest()->take(5)->get();
        $jurusan = jurusan::all();
        $eskul = Eskul::with('guru')->get();
        $profil = Profil::first();
        $totalGuru = Guru::count();
        $totalSiswa = Siswa::count();
        $totalJurusan = jurusan::count();
        $totalEskul = Eskul::count();

        return view('public.home', compact(
                'berita','guru','jurusan' ,'eskul', 'profil',
                'totalGuru', 'totalSiswa', 'totalJurusan', 'totalEskul'
            )   
        );
    }

    public function profil(){
        $profil = Profil::first();

        return view('public.profil', compact('profil'));
    }

    public function guru(Request $request){
        $data = Guru::query()
        ->when($request->q, function ($query, $q) {
            $query->where('namaGuru', 'like', "%{$q}%");
        })
        ->orderBy('namaGuru')
        ->paginate(12)
        ->withQueryString();

        return view('public.guru', compact('data'));
    }

    public function berita(Request $request)
    {
        $data = Berita::where('status', 'Publish')
            ->when($request->search, function ($q, $search) {
                $q->where(function ($q) use ($search) {
                    $q->where('judul', 'like', "%{$search}%")
                    ->orWhere('isi', 'like', "%{$search}%");
                });
            })
            ->orderByDesc('tanggal')
            ->paginate(9)
            ->withQueryString();

        return view('public.berita.berita', compact('data'));
    }

    public function detail($slug){
        $baru = Berita::where('slug', $slug)->where('status', 'Publish')->firstOrFail();
        $data = Berita::where('status', 'Publish')
                        ->where('id', '!=', $baru->id)
                        ->orderByDesc('tanggal')
                        ->take(5)
                        ->get();

        return view('public.berita.detail', compact('data','baru'));
    }

    public function jurusan(){
        $data = jurusan::all();
        return view('public.jurusan', compact('data'));
    }

    public function sosmed(){
        $sosmed = sosmed::all();
        return view('public.temp', compact('sosmed'));
    }
}
