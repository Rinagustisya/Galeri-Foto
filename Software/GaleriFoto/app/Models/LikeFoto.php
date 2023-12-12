<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeFoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_like',
        'foto_id',
        'user_id'
    ];
}
