<?php

namespace App\Http\Controllers;

use App\Models\Eskul;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class eskulController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $data = Eskul::with('guru')
            ->where(function($q) use ($search){
                $q->where('namaEskul', 'like', '%' . $search . '%')
                    ->orWhere('jadwalLatihan', 'like', '%' . $search . '%');
            })->latest()->get();

        return view('admin.eskul.index', compact('data'));
    }

    public function create()
    {
        $guru = Guru::all();
        return view('admin.eskul.create', compact('guru'));
    }

    public function store(Request $request)
    {
        $valid = $request->validate([
            'namaEskul' => 'required|string|max:40',
            'idGuru' => 'required|exists:guru,id',
            'jadwalLatihan' => 'required|string|max:40',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:5120'
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('eskul', 'public');
            $valid['gambar'] = $path;
        }

        Eskul::create($valid);

        return redirect()->route('eskul.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $data = Eskul::findOrFail($id);
        $guru = Guru::all();
        return view('admin.eskul.update', compact('data', 'guru'));
    }

    public function update(Request $request, string $id)
    {
        $data = Eskul::findOrFail($id);
        $valid = $request->validate([
            'namaEskul' => 'required|string|max:40',
            'guru_id' => 'required|exists:guru,id',
            'jadwalLatihan' => 'required|string|max:40',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:5120'
        ]);

        if ($request->hasFile('gambar')) {
            if ($data->gambar) {
                Storage::disk('public')->delete($data->gambar);
            }
            $valid['gambar'] = $request->file('gambar')->store('eskul', 'public');
        }

        $data->update($valid);

        return redirect()->route('eskul.index')->with('success', 'Data berhasil diubah');
    }

    public function delete(string $id)
    {
        $data = Eskul::find($id);
        if ($data) {
            $data->delete();
        }

        return redirect()->route('eskul.index')->with('success', 'Data berhasil dihapus');
    }
}