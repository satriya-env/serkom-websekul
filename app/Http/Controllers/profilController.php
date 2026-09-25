<?php

namespace App\Http\Controllers;

use App\Models\Profil;
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
        $data = Profil::first();
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
    public function edit()
    {
        //
        $data = Profil::first() ?? new Profil();
        return view('admin.profilSekolah.form', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $request->validate([
            'namaSekolah'   => 'required|string|max:40',
            'kepalaSekolah' => 'required|string|max:40',
            'foto'          => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
            'logo'          => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
            'npsn'          => 'required|string|max:10',
            'alamat'        => 'required|string',
            'kontak'        => 'required|string|max:15',
            'visiMisi'      => 'required|string',
            'tahunBerdiri'  => 'required|numeric|digits:4',
            'deskripsi'     => 'required|string',
        ]);

        $data = profil::first() ?? new profil();

        // Olah gambar jika ada file baru di-upload
        if ($request->hasFile('foto')) {
            // Hapus logo lama dari folder storage jika ada
            if ($data->foto && Storage::disk('public')->exists($data->foto)) {
                Storage::disk('public')->delete($data->logo);
            }

            // Simpan logo baru dan update properti $data->logo
            $path = $request->file('foto')->store('profil/foto', 'public');
            $data->foto = $path;
        }

        if ($request->hasFile('logo')) {
            // Hapus logo lama dari folder storage jika ada
            if ($data->logo && Storage::disk('public')->exists($data->logo)) {
                Storage::disk('public')->delete($data->logo);
            }

            // Simpan logo baru dan update properti $data->logo
            $path = $request->file('logo')->store('profil/logo', 'public');
            $data->logo = $path;
        }
        
        $data->namaSekolah   = $request->namaSekolah;
        $data->kepalaSekolah = $request->kepalaSekolah;
        $data->npsn          = $request->npsn;
        $data->alamat        = $request->alamat;
        $data->kontak        = $request->kontak;
        $data->visiMisi      = $request->visiMisi;
        $data->tahunBerdiri  = $request->tahunBerdiri;
        $data->deskripsi     = $request->deskripsi;
        $data->save();

        return redirect()->route('profil.index')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
