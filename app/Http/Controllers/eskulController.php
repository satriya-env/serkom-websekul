<?php

namespace App\Http\Controllers;

use App\Models\Eskul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class eskulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->input('search');
        $data = Eskul::where(function($q) use ($search){
            $q->where('namaEskul', 'like', '%' . $search . '%')
                ->orwhere('jadwalLatihan', 'like', '%' . $search . '%');
        })->latest()->get();

        return view('admin.eskul.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.eskul.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $valid = $request->validate([
            'namaEskul' => 'required|string|max:40',
            'pembina' => 'required|string|max:40',
            'jadwalLatihan' => 'required|string|max:40',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mime:jpeg,png,jpg|max:5120'
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('eskul','public');
            $valid['gambar'] = $path;
        }

        $valid['idGuru'] = auth()->id();
        Eskul::create($valid);

        return redirect()->route('eskul.index')->with('success', 'Data berhasil ditambahkan');
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
        $data = Eskul::findOrFail($id);
        return view('admin.eskul.update', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = Eskul::findOFail($id);
        $valid = $request->validate([
            'namaEskul' => 'required|string|max:40',
            'pembina' => 'required|string|max:40',
            'jadwalLatihan' => 'required|string|max:40',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mime:jpeg,png,jpg|max:5120'
        ]);

        if ($request->hasFile('gambar')) {
            if ($data->gambar) {
                Storage::disk('public')->delete($data->gambar);
            }
            $valid['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $data->update($valid);

        return redirect()->route('eskul.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        //
        $data = Eskul::find($id);
        if ($data) {
            $data->delete();
        }

        return redirect()->route('eskul.index')->with('success', 'Data berhasil dihapus');
    }
}
