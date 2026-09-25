<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class guruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $guru = Guru::all();
        return view('admin.guru.index', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'namaGuru' => 'required|string|max:40',
            'nip' => 'required|string|max:15',
            'mapel' => 'required|string|max:40',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);
        
        $path = $request->hasFile('foto')
            ? $request->file('foto')->store('guru/foto', 'public')
            : null;

        Guru::create([
            'namaGuru' => $request->namaGuru,
            'nip' => $request->nip,
            'mapel' => $request->mapel,
            'foto' => $path
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $guru = Guru::findOrFail($id);
        return view('admin.guru.update', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $guru = Guru::findOrFail($id);

        $request->validate([
            'namaGuru' => 'required|string|max:40',
            'nip' => 'required|string|size:15|unique:guru,nip,'.$guru->id,
            'mapel' => 'required|string|max:40',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);
        
        if ($request->hasFile('foto')) {
            if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
                Storage::disk('public')->delete($guru->foto);
            }
            $path = $request->file('foto')->store('guru/foto', 'public');
            $guru->foto = $path;
        }

        $guru->namaGuru = $request->namaGuru;
        $guru->nip      = $request->nip;
        $guru->mapel    = $request->mapel;
        $guru->save();

        return redirect()->route('guru.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        //
        $guru = Guru::find($id);
        if($guru){
            $guru->delete();
        }
        return redirect()->route('guru.index')->with('success', 'Data berhasil dihapus');
    }
}
