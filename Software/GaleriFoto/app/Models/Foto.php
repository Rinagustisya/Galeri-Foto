<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul_foto',
        'deskripsi_foto',
        'tgl_unggah',
        'lokasi_file',
        'album_id',
        'user_id'
    ];
}
