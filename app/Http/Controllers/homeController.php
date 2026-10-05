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
}
