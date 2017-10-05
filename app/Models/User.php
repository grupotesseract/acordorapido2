<?php

/*
 * Desenvolvedores:
 * Fernando Fernandes
 * Evandro Carreira
 * Renato Gomes
 *
 */

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that should be treated as \Carbon\Carbon instances.
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'created_at', 'updated_at', 'deleted_at'];

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
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'email' => 'required:email',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function empresas()
    {
        return $this->belongsToMany(\App\Models\Empresa::class);
    }

    /**
     * Pega o cliente do user.
     */
    public function cliente()
    {
        return $this->hasOne('App\Models\Cliente');
    }

    /**
     * Pega os avisos desse usuario.
     */
    public function avisos()
    {
        return $this->hasMany('App\Models\Aviso');
    }

    /**
     * Pega os Acordos desse usuario.
     */
    public function acordos()
    {
        return $this->hasMany('App\Models\Acordo');
    }

    /**
     * Importacoes feitas por esse usuario.
     */
    public function importacoes()
    {
        return $this->hasMany('App\Models\Importacao');
    }
}
