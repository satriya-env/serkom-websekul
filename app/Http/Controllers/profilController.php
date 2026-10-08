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
        return view('admin.profil.index', compact('data'));
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
        $data = Profil::firstOrNew();
        $imageRule = $data->exists ? 'nullable' : 'required' . '|image|mimes:jpeg,png,jpg|max:10240';

        // 1. Definisikan pemetaan aturan validasi dan penanganan berkas per section
        $sections = [
            'sambutan' => [
                'rules' => ['kepalaSekolah' => 'required|string|max:40', 'sambutan' => 'required|string', 'fotoKepala' => $imageRule],
                'fields' => ['kepalaSekolah', 'sambutan'],
                'files' => ['fotoKepala' => 'profil/kepala'],
            ],
            'data-sekolah' => [
                'rules' => ['namaSekolah' => 'required|string|max:40', 'npsn' => 'required|string|max:10', 'tahunBerdiri' => 'required|digits:4|integer', 'alamat' => 'required|string', 'kontak' => 'required|string|max:15'],
                'fields' => ['namaSekolah', 'npsn', 'tahunBerdiri', 'alamat', 'kontak'],
            ],
            'sejarah' => [
                'rules' => ['sejarah' => 'required|string'],
                'fields' => ['sejarah'],
            ],
            'visi-misi' => [
                'rules' => ['visi' => 'required|string', 'misi' => 'required|string'],
                'fields' => ['visi', 'misi'],
            ],
            'lainnya' => [
                'rules' => ['deskripsi' => 'required|string', 'logoSekolah' => $imageRule, 'fotoSekolah' => $imageRule],
                'fields' => ['deskripsi'],
                'files' => ['logoSekolah' => 'profil/logo', 'fotoSekolah' => 'profil/sekolah'],
            ],
        ];

        $sectionKey = $request->section;

        if (!isset($sections[$sectionKey])) {
            return redirect()->back()->withErrors(['Section tidak valid.']);
        }

        $config = $sections[$sectionKey];

        // 2. Eksekusi validasi
        $request->validate($config['rules']);

        // 3. Proses pengunggahan berkas secara otomatis (jika ada)
        foreach ($config['files'] ?? [] as $fileField => $path) {
            if ($request->hasFile($fileField)) {
                $data->{$fileField} = $this->uploadImage($request, $fileField, $path, $data->{$fileField});
            }
        }

        // 4. Isi dan simpan data
        $data->fill($request->only($config['fields']))->save();

        return redirect()->back()->with('success', 'Data profil berhasil diperbarui');
    }

/**
 * Helper untuk mengunggah gambar baru & menghapus gambar lama
 */
private function uploadImage(Request $request, string $fieldName, string $folder, ?string $oldPath): ?string
{
    if (!$request->hasFile($fieldName)) {
        return $oldPath;
    }

    // Hapus file lama dari storage jika ada
    if ($oldPath && Storage::disk('public')->exists($oldPath)) {
        Storage::disk('public')->delete($oldPath);
    }

    // Simpan file baru
    return $request->file($fieldName)->store($folder, 'public');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
