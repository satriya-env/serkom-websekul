<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    //
    protected $table = 'profil';
    protected $fillable = [
        'kepalaSekolah',
        'sambutan',
        'fotoKepala',
        'namaSekolah',
        'npsn',
        'tahunBerdiri',
        'alamat',
        'kontak',
        'sejarah',
        'visi',
        'misi',
        'deskripsi',
        'logoSekolah',
        'fotoSekolah',
    ];
}
