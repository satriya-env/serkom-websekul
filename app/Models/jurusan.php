<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jurusan extends Model
{
    //
    protected $table = 'jurusan';
    protected $fillable = [
        'alias', 
        'nama', 
        'logo', 
        'gambar', 
        'deskripsi', 
        'materi', 
        'karier',
    ];
}
