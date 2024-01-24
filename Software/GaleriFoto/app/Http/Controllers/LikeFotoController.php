<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\LikeFoto;
use Illuminate\Http\Request;

class LikeFotoController extends Controller
{
    public function likeFoto(Request $request)
    {
        $data = $request->validate([
            'foto_id' => 'required|exists:fotos,id',
            'user_id' => 'required|exists:users,id',
        ]);

        // Cek apakah user sudah melakukan like pada foto ini sebelumnya
        $existingLike = LikeFoto::where('foto_id', $data['foto_id'])
            ->where('user_id', $data['user_id'])
            ->first();

        if ($existingLike) {
            // User sudah melakukan like sebelumnya, tambahkan logika untuk menghapus like jika diinginkan
            $existingLike->delete();
            return response()->json(['message' => 'Like removed successfully']);
        }

        // User belum melakukan like sebelumnya, tambahkan like baru
        $like = LikeFoto::create([
            'tgl_like' => now(),
            'foto_id' => $data['foto_id'],
            'user_id' => $data['user_id'],
        ]);

        // Ambil ulang data foto setelah like
        $foto = Foto::with('likes.user')->find($data['foto_id']);

        return response()->json([
            'message' => 'Like added successfully',
            'liked_by' => $foto->likes->pluck('user.name')->toArray(),
        ]);
    }
}
