<?php

namespace App\Http\Controllers;

use Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // Validation
        $request->validate([
            'nama_lengkap' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|email',
            'alamat' => 'required|string',
        ]);

        // Update user profile data
        Auth::user()->update([
            'nama_lengkap' => $request->input('nama_lengkap'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'alamat' => $request->input('alamat'),
        ]);

        Alert::success('Hore!', 'Data Profil Berhasil Diubah!');
        return redirect()->back();
    }

    public function updatePassword(Request $request)
    {
        // Validation
        $request->validate([
            'password' => 'required|string|min:4|confirmed',
        ]);

        // Update user password
        Auth::user()->update([
            'password' => bcrypt($request->input('password')),
        ]);

        Alert::success('Hore!', 'Password Berhasil Diubah!');
        return redirect()->back();
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
