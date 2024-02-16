<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KomentarFoto;
use Alert;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class KomenController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'isi_komentar' => 'required',
            'tgl_komentar' => 'required',
            'user_id' => 'required',
            'foto_id' => 'nullable',
        ]);

        $fotoId = $request->filled('foto_id') ? $request->foto_id : null;

        KomentarFoto::create([
            'isi_komentar' => $request->isi_komentar,
            'tgl_komentar' => Carbon::now(),
            'user_id' => Auth::id(),
            'foto_id' => $fotoId
        ]);

        Alert::success('Sukses!', 'Komentar Anda Berhasil Dikirim!');
        return redirect()->route('home');
    }

    public function getComments(Request $request)
    {
        $fotoId = $request->input('foto_id');
        $comments = KomentarFoto::with('user')->where('foto_id', $fotoId)->get();

        return response()->json(['comments' => $comments]);
    }

    public function submit(Request $request)
    {
        try {
            $request->validate([
                'reply' => 'required',
                'tgl_komentar' => 'required',
                'user_id' => 'required',
                'foto_id' => 'nullable',
            ]);

            $fotoId = $request->filled('foto_id') ? $request->foto_id : null;
            KomentarFoto::create([
                'isi_komentar' => $request->reply,
                'tgl_komentar' => Carbon::now(),
                'user_id' => Auth::id(),
                'foto_id' => $fotoId
            ]);

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

}
