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
        $search = $request->search;
        $data = Foto::select('foto.id', 'foto.judul_foto', 'foto.deskripsi_foto', 'foto.lokasi_file', 'foto.privasi', 'album.nama_album', 'user.nama_lengkap')
            ->join('album', 'foto.album_id', '=', 'album.id')
            ->join('user', 'foto.user_id', '=', 'user.id')
            ->when($search, function ($query, $search) {
                return $query->where('foto.nama_album', 'like', "%{$search}%")
                    ->orWhere('foto.nama_foto', 'like', "%{$search}%")
                    ->orWhere('user.nama_lengkap', 'like', "%{$search}%");
            })
            ->paginate(5);

        return view('data-foto', ['data' => $data]);

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
            'privasi' => 'required|in:Public,Private',
            'deskripsi_foto' => 'nullable|string',
            'tgl_unggah' => 'required',
            'lokasi_file' => 'required|image|mimes:jpeg,png,jpg,gif', 
        ]);

        $user = Auth::user();

        $album = Album::firstOrCreate(['nama_album' => $request->nama_album]);
        $request->merge(['album_id' => $album->id]);

         //upload image
         $file = $request->file('lokasi_file');
         $fileHashName = $file->storeAs('public/data_foto', $file->hashName()); 

         Foto::create([
            'judul_foto' => $request->judul_foto,
            'privasi' => $request->privasi,
            'deskripsi_foto' => $request->deskripsi_foto,
            'tgl_unggah' => now(),
            'lokasi_file' => $fileHashName,
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
        $queryId = $request->query('data');
        $pesan = Foto::find($queryId);
        return view('data-foto', ['row'=>$data]);
    }

    public function showGambar($filename)
    {
        $path = 'public/data_foto/' . $filename;
        $filePath = storage_path('app/' . $path);

        if (Storage::exists($path)) {
            $fileContents = file_get_contents($filePath);
            return response($fileContents)->header('Content-Type', 'image/jpeg');
        }

        abort(404);
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
