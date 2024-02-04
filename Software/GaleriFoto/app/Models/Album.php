<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
     
    protected $fillable = [
        'nama_album',
        'custom_category',
        'Deskripsi',
        'tgl_buat',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function foto()
    {
        return $this->belongsTo(Foto::class);
    }
}
