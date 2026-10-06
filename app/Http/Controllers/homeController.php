<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Eskul;
use Illuminate\Http\Request;

class homeController extends Controller
{
    //
    public function index(Request $request)
    {
        $berita = Berita::where('status', 'Publish')
                    ->orderBy('tanggal', 'desc')
                    ->take(3)->get();

        $eskul = Eskul::with('guru')->get();

        return view('public.home', compact('berita', 'eskul'));
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
}
