<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KomentarFoto;
use Alert;
use Illuminate\Support\Facades\Auth;
class KomenController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'isi_komentar' => 'required',
            'tgl_komentar' => 'required',
            'user_id' => 'required',
            'foto_id' => 'required',
        ]);

        KomentarFoto::create([
            'tgl_komentar' => $request->tgl_komentar,
            'isi_komentar' => $request->isi_komentar,
            'user_id' => Auth::id(),
            'foto_id' => $request->foto_id,
        ]);

        Alert::success('Sukses!', 'Komentar Anda Berhasil Dikirim!');
        return redirect()->route('home');
    }
}
