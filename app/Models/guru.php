<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    
    protected $table ='guru';
    protected $fillable = [
        'namaGuru',
        'nip',
        'mapel',
        'foto',
    ];

    public function guru(){
        return $this->hasMany(Eskul::class, 'idGuru', 'id');
    }
}
