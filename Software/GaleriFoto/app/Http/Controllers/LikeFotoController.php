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

        $existingLike = LikeFoto::where('foto_id', $data['foto_id'])
            ->where('user_id', $data['user_id'])
            ->first();

        if ($existingLike) {
            $existingLike->delete();
            
            $foto = Foto::with("likes.user")->find($data['foto_id']);
            
            return response()->json(
                [
                    "message" => "Like removed successfully",
                    "liked_by" => $foto->likes->pluck('user.username')->toArray(),
                ]
            );
        }

        $like = LikeFoto::create([
            'tgl_like' => now(),
            'foto_id' => $data['foto_id'],
            'user_id' => $data['user_id'],
        ]);

        $foto = Foto::with('likes.user')->find($data['foto_id']);

        return response()->json([
            "message" => "Like added successfully",
            "liked_by" => $foto->likes->pluck('user.username')->toArray(),
        ]);
    }

    public function getLikeStatus(Request $request)
    {
        $fotoId = $request->input('foto_id');
        $userId = $request->input('user_id');

        $isLiked = Like::where('foto_id', $fotoId)
            ->where('user_id', $userId)
            ->exists();

        return response()->json(['isLiked' => $isLiked]);
    }

}
