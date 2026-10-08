<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sosmed extends Model
{
    //
    protected $table = 'sosmed';
    protected $fillable = [
        'platform',
        'link',
    ];
}
