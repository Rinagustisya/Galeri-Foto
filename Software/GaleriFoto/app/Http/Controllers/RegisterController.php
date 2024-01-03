<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.register');
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
         // Validate the form data
         $request->validate([
            'nama_lengkap' => 'required|string',
            'username' => 'required|string|unique:users',
            'alamat' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user
        $user = User::create([
            'nama_lengkap' => $request->input('nama_lengkap'),
            'username' => $request->input('username'),
            'alamat' => $request->input('alamat'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        // Log in the newly registered user (optional)
        auth()->login($user);

        // Redirect to the login page after successful registration
        return redirect()->route('login.show')->with('success', 'Registration successful. Please log in.');
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
