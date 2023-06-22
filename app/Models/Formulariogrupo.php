<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Formulario;

class Formulariogrupo extends Model
{
    use HasFactory;

    protected $table = 'formulariogrupo';

    
    public $timestamps = false;

    protected $fillable = [
        'form_id',
        'grupo_id',
        'inclui',
        'altera',
        'exclui'
    ];
    

    public function form()
    {
        return $this->belongsTo('App\Models\Formulario');
    }

}
