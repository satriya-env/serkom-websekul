<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    //
    protected $table = 'siswa';

    protected $fillable = [
        'nisn',
        'namaSiswa',
        'jenisKelamin',
        'idKelas',
        'tahunMasuk',
    ];

    public function kelas(){
        return $this->belongsTo(kelas::class, 'idKelas', 'id');
    }
}
