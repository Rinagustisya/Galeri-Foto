<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
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
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Attempt to log in the user
        $credentials = $request->only('username', 'password');
        if (auth()->attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('dashboard'); // Redirect to the intended page after successful login
        }

        // Authentication failed...
        return redirect()->back()->withInput($request->only('username'))
            ->withErrors(['loginError' => 'Invalid credentials. Please try again.']);
    }


    public function logout()
    {
        Auth::logout();

        return redirect()->route('home'); // Redirect to the home route after logout
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
