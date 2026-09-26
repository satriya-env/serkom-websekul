<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $siswa = Siswa::all();
        return view('admin.siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nisn' => 'required|string|size:10|unique:siswa,nisn',
            'namaSiswa' => 'required|string|max:40',
            'jenisKelamin' => 'required|in:Laki-laki,Perempuan',
            'tahunMasuk' => 'required|integer|digits:4',
        ]);

        Siswa::create([
            'nisn' => $request->nisn,
            'namaSiswa' => $request->namaSiswa,
            'jenisKelamin' => $request->jenisKelamin,
            'tahunMasuk' => $request->tahunMasuk,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data berhasil ditambahkan');
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
        $siswa = Siswa::findOrFail($id);
        return view('admin.siswa.update', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $siswa = Siswa::findOrFail($id);
        $request->validate([
            'nisn' => 'required|string|max:10',
            'namaSiswa' => 'required|string|max:40',
            'jenisKelamin' => 'required|in:Laki-laki,Perempuan',
            'tahunMasuk' => 'required|integer|digits:4|min:1998|max:'.date('Y'),
        ]);
        $siswa->update([
            'nisn' => $request->nisn,
            'namaSiswa' => $request->namaSiswa,
            'jenisKelamin' => $request->jenisKelamin,
            'tahunMasuk' => $request->tahunMasuk,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data Siswa berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(siswa $siswa)
    {
        //
    }

    public function delete($id){
        $siswa = Siswa::find($id);
        if ($siswa) {
            $siswa->delete();
        }
        return redirect()->route('siswa.index')->with('success', 'Data berhasil dihapus');
    }
}
