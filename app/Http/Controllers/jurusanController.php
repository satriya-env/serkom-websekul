<?php

namespace App\Http\Controllers;

use App\Models\jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class jurusanController extends Controller
{
    /**
     * Aturan validasi dasar (dipakai bersama oleh store & update).
     * Angka di sini harus sama dengan maxlength & teks petunjuk di view.
     */
    private function rules(bool $isCreate): array
    {
        $fileRule = $isCreate ? 'required' : 'nullable';

        return [
            'alias'     => 'required|string|max:50',
            'nama'      => 'required|string|max:255',
            'logo'      => $fileRule . '|image|mimes:png,jpg,jpeg,webp|max:2048',  // 2 MB
            'gambar'    => $fileRule . '|image|mimes:png,jpg,jpeg,webp|max:5120',  // 5 MB
            'deskripsi' => 'required|string',
            'materi'    => 'required|string',
            'karier'    => 'required|string',
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = jurusan::all();

        return view('admin.jurusan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid = $request->validate($this->rules(true));

        $valid['logo']   = $request->file('logo')->store('jurusan', 'public');
        $valid['gambar'] = $request->file('gambar')->store('jurusan', 'public');

        jurusan::create($valid);

        return redirect()->route('jurusan.index')->with('success', 'Data jurusan berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = jurusan::findOrFail($id);

        return view('admin.jurusan.update', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data  = jurusan::findOrFail($id);
        $valid = $request->validate($this->rules(false));

        // Simpan file baru dulu, baru hapus file lama (aman kalau upload gagal)
        if ($request->hasFile('logo')) {
            $newPath = $request->file('logo')->store('jurusan', 'public');
            if ($data->logo) {
                Storage::disk('public')->delete($data->logo);
            }
            $valid['logo'] = $newPath;
        } else {
            unset($valid['logo']);
        }

        if ($request->hasFile('gambar')) {
            $newPath = $request->file('gambar')->store('jurusan', 'public');
            if ($data->gambar) {
                Storage::disk('public')->delete($data->gambar);
            }
            $valid['gambar'] = $newPath;
        } else {
            unset($valid['gambar']);
        }

        $data->update($valid);

        return redirect()->route('jurusan.index')->with('success', 'Data jurusan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     * (Method name diganti dari delete() menjadi destroy() agar cocok dengan route resource.)
     */
    public function delete(string $id)
    {
        $data = jurusan::findOrFail($id);

        if ($data->logo) {
            Storage::disk('public')->delete($data->logo);
        }
        if ($data->gambar) {
            Storage::disk('public')->delete($data->gambar);
        }

        $data->delete();

        return redirect()->route('jurusan.index')->with('success', 'Data jurusan berhasil dihapus.');
    }
}