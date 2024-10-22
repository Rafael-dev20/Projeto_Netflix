<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'email', 'password', 'dt_nascimento', 'plano', 'dt_inicio_plano', 'fg_admin'
    ];

    protected $hidden = [
        'password'
    ];

    public $timestamps  = false;

    public function favoritos()
    {
        return $this->hasMany(Favorito::class, 'idUsuarios');
    }
    
}
