<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class guruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->input('search');
        $guru = Guru::where(function($q) use ($search){
            $q->where('namaGuru', 'like', '%' . $search . '%');
        })->get();
        return view('admin.guru.index', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $mapel = mapel::all();
        return view('admin.guru.create', compact('mapel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $valid = $request->validate([
            'namaGuru' => 'required|string|max:40',
            'nip' => 'required|string|max:15',
            'idMapel' => 'required|exists:mapel,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);
        
        $path = $request->hasFile('foto')
            ? $request->file('foto')->store('guru', 'public')
            : null;

        Guru::create($valid);
        return redirect()->route('guru.index')->with('success','Data berhasil diperbarui');
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
        $mapel = mapel::all();
        return view('admin.guru.update', compact('guru', 'mapel'));
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
            'idMapel' => 'required|exists:mapel,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);
        
        if ($request->hasFile('foto')) {
            if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
                Storage::disk('public')->delete($guru->foto);
            }
            $path = $request->file('foto')->store('guru', 'public');
            $guru->foto = $path;
        }

        $guru->namaGuru = $request->namaGuru;
        $guru->nip      = $request->nip;
        $guru->idMapel    = $request->idMapel;
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
