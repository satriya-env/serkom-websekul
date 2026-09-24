<?php

namespace App\Http\Controllers;

use App\Models\profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class profilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = profil::first();
        return view('admin.profilSekolah.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'namaSekolah'   => 'required|string|max:40',
            'kepalaSekolah' => 'required|string|max:40',
            'logo'          => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // 1. DIUBAH ke nullable
            'npsn'          => 'required|string|max:10',
            'alamat'        => 'required|string',
            'kontak'        => 'required|string|max:15',
            'visiMisi'      => 'required|string',
            'tahunBerdiri'  => 'required|numeric|digits:4',
            'deskripsi'     => 'required|string',
        ]);

        $data = profil::first() ?? new profil();

        // Olah gambar jika ada file baru di-upload
        if ($request->hasFile('logo')) {
            // Hapus logo lama dari folder storage jika ada
            if ($data->logo && Storage::disk('public')->exists($data->logo)) {
                Storage::disk('public')->delete($data->logo);
            }

            // Simpan logo baru dan update properti $data->logo
            $path = $request->file('logo')->store('profil', 'public');
            $data->logo = $path;
        }

        // Assign data teks ke properti model
        $data->namaSekolah   = $request->namaSekolah;
        $data->kepalaSekolah = $request->kepalaSekolah;
        $data->npsn          = $request->npsn;
        $data->alamat        = $request->alamat;
        $data->kontak        = $request->kontak;
        $data->visiMisi      = $request->visiMisi;
        $data->tahunBerdiri  = $request->tahunBerdiri;
        $data->deskripsi     = $request->deskripsi;

        // 2. Simpan semua perubahan ke database (aman untuk data baru maupun lama)
        $data->save();

        return back()->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
