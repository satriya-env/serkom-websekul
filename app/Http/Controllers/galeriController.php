<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class galeriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Galeri::all();
        return view('admin.galeri.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.galeri.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'judul' => 'required|string|max:30',
            'keterangan' => 'nullable|string',
            'file' => 'required|file|mimes:jpeg,png,jpg,mp4|max:25600',
            'kategori' => 'required|in:Foto,Video',
            'tanggal' => 'required|date',
        ]);

        $path = null;
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('galeri', 'public');
        }

        Galeri::create([
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'file' => $path,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('galeri.index')->with('success','Data berhasil diperbarui');
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
        $data = Galeri::findOrFail($id);
        return view('admin.galeri.update', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = Galeri::findOrFail($id);

        $update = $request->validate([
            'judul' => 'required|string|max:30',
            'keterangan' => 'nullable|string',
            'file' => 'nullable|file|mimes:jpeg,png,jpg,mp4|max:25600',
            'kategori' => 'required|in:Foto,Video',
            'tanggal' => 'required|date',
        ]);
        
        $path = null;
        if ($request->hasFile('file')) {
            if ($data->file && Storage::disk('public')->exists($data->file)) {
                Storage::disk('public')->delete($data->file);
            }
            $path = $request->file('file')->store('galeri', 'public');
            $data->file = $path;
        }

        $data->judul = $request->judul;
        $data->keterangan = $request->keterangan;
        $data->kategori = $request->kategori;
        $data->tanggal = $request->tanggal;
        $data->save();

        return redirect()->route('galeri.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        //
        $data = Galeri::find($id);
        if($data){
            $data->delete();
        }
        return redirect()->route('galeri.index')->with('success', 'Data berhasil dihapus');
    }
}
