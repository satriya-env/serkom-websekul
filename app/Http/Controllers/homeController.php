<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class homeController extends Controller
{
    //
    public function index(Request $request)
    {
        $berita = Berita::where('status', 'Publish')
                    ->orderBy('tanggal', 'desc')
                    ->take(3)->get();

        return view('public.landing', compact('berita'));
    }
}
