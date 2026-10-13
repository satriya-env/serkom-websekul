<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = kelas::all();
        return view('admin.kelas.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(['nama' => 'required|string']);
        kelas::create(['nama' => $request->nama]);

        return redirect()->route('kelas.index')->with('success', 'Data Kelas berhasil diedit');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $kelas = kelas::findOrFail($id);
        return view('admin.siswa.update', compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $data = kelas::findOrFail($id);
        $request->validate(['nama' => 'required|string']);

        $data->update(['nama' => $request->nama]);

        return redirect()->route('kelas.index')->with('success', 'Data Kelas berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id){
        $data = kelas::find($id);
        if ($data) {
            $data->delete();
        }
        return redirect()->route('siswa.index')->with('success', 'Data berhasil dihapus');
    }
}
