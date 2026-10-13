<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mapel extends Model
{
    //
    protected $table = 'mapel';
    protected $fillable = [
        'pelajaran',
        'alias',
    ];
    public function mapel(){
        return $this->hasMany(mapel::class, 'idMapel', 'id');
    }
}
