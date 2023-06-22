<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'grupo_id',
        'status',
    ];

    public function temPermissao($form_id, $tipo)
    {
        $user_id = auth()->user()->id;
        $grupo_id = auth()->user()->grupo_id;
        $sql = "select * from formulariogrupo
        inner join formulario on formulariogrupo.form_id = formulario.id";
        $sql = $sql . " where form_id = '$form_id' ";
        $sql = $sql . " and grupo_id = '$form_id' ";
        if ($tipo == 'inclui'){
            $sql = $sql . " and formulariogrupo.inclui = 1 ";
        }
        if ($tipo == 'altera'){
            $sql = $sql . " and formulariogrupo.altera = 1 ";
        }
        if ($tipo == 'exclui'){
            $sql = $sql . " and formulariogrupo.exclui = 1 ";
        }
        $verifica = DB::select($sql);
        
        if ($verifica == [])
            return false;
        else 
            return true;


    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
