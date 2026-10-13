<?php

namespace App\Http\Controllers;

use App\Models\mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->input('search');
        $data = mapel::where(function($q) use ($search){
            $q->where('pelajaran', 'like', '%' . $search . '%')
            ->orWhere('alias', 'like', '%' . $search . '%');
        })->get();

        return view('admin.mapel.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.mapel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'pelajaran' => 'required|string',
            'alias' => 'required|string'
        ]);

        mapel::create([
            'pelajaran' => $request->pelajaran,
            'alias' => $request->alias
        ]);
        return redirect()->route('mapel.index')->with('success','Data berhasil diperbarui');
    }

    /**
     * Display the specified resource.
     */
    public function show(mapel $mapel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = mapel::findOrFail($id);
        return view('admin.mapel.update', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = mapel::findOrFail($id);
        $request->validate([
            'pelajaran' => 'required|string',
            'alias' => 'required|string'
        ]);

        $data->update([
            'pelajaran' => $request->pelajaran,
            'alias' => $request->alias
        ]);
        return redirect()->route('mapel.index')->with('success', 'User berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        //
        $data = mapel::find($id);
        if ($data) {
            $data->delete();
        }
        return redirect()->route('mapel.index')->with('success', 'Data berhasil dihapus');
    }
}
