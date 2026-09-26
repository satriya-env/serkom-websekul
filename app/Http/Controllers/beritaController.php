<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Berita::with('user')->latest()->get();
        return view('admin.berita.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'judul'   => 'required|string|max:50',
            'isi'     => 'required|string',
            'tanggal' => 'required|date',
            'gambar'  => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'status'  => 'required|in:Draf,Publish', // Diubah ke huruf kecil sesuai ERD
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('berita', 'public');
            $valid['gambar'] = $path;
        }

        // Isi idUser secara otomatis berdasarkan ID user yang login
        $valid['idUser'] = auth()->id();
        
        Berita::create($valid);

        return redirect()->route('berita.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Berita $berita)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Berita::findOrFail($id);
        return view('admin.berita.update', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Berita::findOrFail($id);

        $valid = $request->validate([
            'judul'   => 'required|string|max:50',
            'isi'     => 'required|string',
            'tanggal' => 'required|date',
            'gambar'  => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'status'  => 'required|in:Draf,Publish', 
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama dari storage
            if ($data->gambar) {
                Storage::disk('public')->delete($data->gambar);
            }
            $valid['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $data->update($valid);

        return redirect()->route('berita.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $data)
    {
        //
    }

    public function delete(string $id)
    {
        $data = Berita::find($id);
        if ($data) {
            $data->delete();
        }
        return redirect()->route('berita.index')->with('success', 'Data berhasil dihapus');
    }
}
