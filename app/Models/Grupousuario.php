<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupousuario extends Model
{
    use HasFactory;

    protected $table = 'grupousuario';

    public $timestamps = false;

    protected $fillable = [
        'nome',
    ];

}
