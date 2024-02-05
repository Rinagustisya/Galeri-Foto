<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Foto;
use Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DataFotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $data = Foto::select('fotos.id', 'fotos.judul_foto', 'fotos.deskripsi_foto', 'fotos.lokasi_file', 'fotos.privasi', 'albums.nama_album', 'albums.custom_category', 'users.nama_lengkap')
        ->join('albums', 'fotos.album_id', '=', 'albums.id')
        ->join('users', 'fotos.user_id', '=', 'users.id')
        ->where('fotos.user_id', auth()->id())
        ->when($search, function ($query, $search) {
            return $query->where('albums.nama_album', 'like', "%{$search}%")
                ->orWhere('fotos.judul_foto', 'like', "%{$search}%")
                ->orWhere('users.nama_lengkap', 'like', "%{$search}%");
        })
        ->orderBy('tgl_unggah', 'desc')
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
        $nama_album = $request->input('nama_album');

        // Validate the form data
        $request->validate([
            'nama_album' => 'required|in:Arsitektur,Dokumenter,Seni rupa,Fashion,Olahraga,Makanan,Satwa liar,Hewan,Laut,Perjalanan,Lainnya',
            'judul_foto' => 'required|string|max:255',
            'privasi' => 'required|in:Public,Private',
            'deskripsi_foto' => 'nullable|string',
            'tgl_unggah' => 'required',
            'lokasi_file' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $user = Auth::user();

        $albumData = ['nama_album' => $request->nama_album];

        if ($request->nama_album === 'Lainnya') {
            $albumData['custom_category'] = $request->kategori_lainnya;
        }
        
        $album = Album::create($albumData);
        
        // Upload image
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
    public function show(int $id)
    {
        try {
            $data = Foto::with('komentar.user')->findOrFail($id);
            $album = Album::find($data->album_id);

            if ($album) {
                // Retrieve custom category directly from the album
                $customCategory = ($album->nama_album === 'Lainnya') ? $album->custom_category : null;

                // Fetch unique albums
                $albums = Album::where('nama_album', $album->nama_album)
                    ->orWhere('nama_album', 'custom_category')
                    ->pluck('nama_album')
                    ->unique();

                return view('data-foto-edit', [
                    'data' => $data,
                    'customCategory' => $customCategory,
                    'albums' => $albums,
                ]);
            } else {
                return back()->with('error', 'Data Not Found!');
            }
        } catch (\Exception $e) {
            \Log::error('Error in show method: ' . $e->getMessage());
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function showGambar($filename = null)
    {
        if ($filename === null) {
            abort(404);
        }

        $path = 'public/data_foto/' . $filename; 
        $filePath = storage_path('app/' . $path);

        if (Storage::exists($path)) {
            $fileContents = file_get_contents($filePath);
            return response($fileContents)->header('Content-Type', 'image/jpeg/jpg/png');
        }

        abort(404);
    }

    public function showEntry(Request $request)
    {
        $categoryFilter = $request->input('category');

        $fotos = Foto::with(['user', 'komentar', 'album'])
        ->where('privasi', 'Public')
        ->when($categoryFilter, function ($query) use ($categoryFilter) {
            return $query->whereHas('album', function ($q) use ($categoryFilter) {
                $q->where('nama_album', $categoryFilter);
            });
        })
        ->orderBy('tgl_unggah', 'desc')
        ->get();
    
        return view('welcome', compact('fotos', 'categoryFilter'));
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_album' => 'required|in:Arsitektur,Dokumenter,Seni rupa,Fashion,Olahraga,Makanan,Satwa liar,Hewan,Laut,Perjalanan,Lainnya',
            'judul_foto' => 'required|string|max:255',
            'privasi' => 'required|in:Public,Private',
            'deskripsi_foto' => 'nullable|string',
            'lokasi_file' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $foto = Foto::find($id);

        if (!$foto) {
            return redirect()->back()->with('error', 'Foto tidak ditemukan');
        }

        $user = Auth::user();

        $album = Album::where('id', $request->input('album_id'))->first();

    if ($album) {
        // Album exists, update the custom category if the album IDs match
        if ($album->id == $request->input('album_id')) {
            $album->update([
                'custom_category' => ($request->nama_album === 'Lainnya') ? $request->input('custom_category') : null,
            ]);
        }
    } else {
        // Album doesn't exist, create a new one
        $album = Album::create([
            'nama_album' => $request->nama_album,
            'custom_category' => ($request->nama_album === 'Lainnya') ? $request->input('custom_category') : null,
        ]);
    }
       

        // Upload image if a new file is provided
        if ($request->hasFile('lokasi_file')) {
            $file = $request->file('lokasi_file');
            $fileHashName = $file->storeAs('public/data_foto', $file->hashName());

            // Delete the old photo if it exists
            if (Storage::exists($foto->lokasi_file)) {
                Storage::delete($foto->lokasi_file);
            }

            $foto->lokasi_file = $fileHashName;
        }

        $foto->judul_foto = $request->judul_foto;
        $foto->privasi = $request->privasi;
        $foto->deskripsi_foto = $request->deskripsi_foto;
        $foto->tgl_unggah = now();
        $foto->album_id = $album->id;
        $foto->user_id = $user->id;
        $foto->save();

        Alert::success('Hore!', 'Berhasil Mengedit Postingan!');
        return redirect()->route('data-foto');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($fotoId)
    {
        $foto = Foto::where('id', $fotoId)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $file = 'public/data_foto/' . $foto->lokasi_file;

        \Log::info('File path:', ['file' => $file]);

        if (Storage::exists($file)) {
            // If the file exists, delete it
            Storage::delete($file);
            \Log::info('File deleted successfully');
        } else {
            \Log::error('File not found');
        }

        $foto->delete();

        Alert::success('Hore!', 'Data Berhasil Dihapus!');
        return redirect()->route('data-foto');
    }

}
