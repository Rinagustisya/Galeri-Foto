<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Foto;
use Alert;
use Illuminate\Support\Facades\Auth;

class DataFotoController extends Controller
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
         // Validate the form data
         $request->validate([
            'nama_album' => 'required|in:Arsitektur,Dokumenter,Seni_rupa,Fashion,Olahraga,Makanan,Satwa_liar,Hewan,Laut,Perjalanan',
            'judul_foto' => 'required|string|max:255',
            'privasi_foto' => 'required|in:Public,Private',
            'deskripsi_foto' => 'nullable|string',
            'tgl_unggah' => 'required',
            'user_id' => 'required',
            'album_id' => 'required',
            'lokasi_file' => 'required|image|mimes:jpeg,png,jpg,gif', 
        ]);

        $user = Auth::user();

        $album = Album::firstOrCreate(['nama_album' => $request->nama_album]);

         //upload image
         $file = $request->file('lokasi_file');
         $file = $file->storeAs('public/data_foto', $image->hashName()); // Adjust the storage path accordingly 

         Foto::create([
            'judul_foto' => $request->judul_foto,
            'privasi' => $request->privasi_foto,
            'deskripsi_foto' => $request->deskripsi_foto,
            'tgl_unggah' => $request->now(),
            'lokasi_file' => $file->hashname(),
            'album_id' => $album->id,
            'user_id' => $user->id
        ]);

        Alert::success('Hore!', 'Berhasil Menambahkan Data!');
        return redirect()->route('data-foto');
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
