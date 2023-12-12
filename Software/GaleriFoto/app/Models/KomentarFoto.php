<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomentarFoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'isi_komentar',
        'tgl_komentar',
        'foto_id',
        'user_id'
    ];
}
