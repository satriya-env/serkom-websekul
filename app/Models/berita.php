<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    //
    protected $table = 'berita';
    protected $fillable = [
        'judul',
        'slug',
        'isi',
        'tanggal',
        'gambar',
        'status',
        'idUser'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'idUser', 'id');
    }
}
