<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Pega a empresa do user.
     */
    public function empresa()
    {
        return $this->hasOne('App\Empresa');
    }

    /**
     * Pega o cliente do user.
     */
    public function cliente()
    {
        return $this->hasOne('App\Cliente');
    }

    /**
     * Pega os avisos desse usuario.
     */
    public function avisos()
    {
        return $this->hasMany('App\Aviso');
    }

    public function importacoes()
    {
        return $this->hasMany('App\Importacao');
    }
}
