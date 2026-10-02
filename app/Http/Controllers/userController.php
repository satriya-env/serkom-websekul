<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = User::all();
        return view('admin.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:30',
            'username' => 'required|string|max:30|unique:user,username',
            'password' => 'required|string|min:6',
            'role'     => 'required|in:Admin,Operator',
            'status'   => 'nullable|in:Aktif,Nonaktif',
        ]);

        User::create([
            'name'     => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role'     => $request->role,
            'status'   => $request->status ?? 'Aktif',
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan');
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
        $user = User::findOrFail($id);
        return view('admin.user.update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'     => 'required|string|max:30',
            'username' => 'required|string|max:30|unique:user,username,'.$user->id,
            'password' => 'nullable|string|min:6',
            'role'     => 'required|in:Admin,Operator',
            'status'   => 'nullable|in:Aktif,Nonaktif',
        ]);

        $password = !empty($request->password) 
            ? bcrypt($request->password) 
            : $user->password;

        $user->update([
            'name'     => $request->name,
            'username' => $request->username,
            'password' => $password,
            'role'     => $request->role,
            'status'   => $request->status ?? 'Aktif',
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function delete($id){
        $user = User::find($id);
        if($user){
            $user->delete();
        }
        return redirect()->route('user.index')->with('success', 'Data berhasil dihapus');
    }
}
