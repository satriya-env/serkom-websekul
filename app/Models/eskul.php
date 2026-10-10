<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eskul extends Model
{
    //
    protected $table = 'eskul';
    protected $fillable = [
        'namaEskul',
        'jadwalLatihan',
        'deskripsi',
        'gambar',
        'idGuru'
    ];

    public function guru(){
        return $this->belongsTo(Guru::class, 'idGuru', 'id');
    }
}
