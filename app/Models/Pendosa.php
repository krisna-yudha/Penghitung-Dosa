<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendosa extends Model
{
    use HasFactory;

    protected $table = 'pendosa';

    protected $fillable = [
        'nama',
        'dosa',
        'jumlah_dosa',
    ];
}
