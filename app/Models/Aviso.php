<?php

/*
 * Desenvolvedores:
 * Fernando Fernandes
 * Evandro Carreira
 * Renato Gomes
 *
 */

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Aviso.
 * @version August 2, 2017, 11:09 pm UTC
 *
 * @method static Aviso find($id=null, $columns = array())
 * @method static Aviso|\Illuminate\Database\Eloquent\Collection findOrFail($id, $columns = ['*'])
 * @property \Illuminate\Database\Eloquent\Collection Titulo
 * @property \Illuminate\Database\Eloquent\Collection User
 * @property \Illuminate\Database\Eloquent\Collection Cliente
 * @property string titulo
 * @property string texto
 * @property int user_id
 * @property int cliente_id
 * @property int titulo_id
 * @property int status
 * @property string estado
 */
class Aviso extends Model
{
    use SoftDeletes;

    public $table = 'avisos';

    /**
     * The attributes that should be treated as \Carbon\Carbon instances.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'tituloaviso',
        'texto',
        'user_id',
        'cliente_id',
        'titulo_id',
        'status',
        'estado',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tituloaviso' => 'string',
        'texto' => 'string',
        'user_id' => 'integer',
        'cliente_id' => 'integer',
        'titulo_id' => 'integer',
        'status' => 'integer',
        'estado' => 'string',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function titulo()
    {
        return $this->belongsTo(\App\Models\Titulo::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function users()
    {
        return $this->hasMany(\App\Models\User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function cliente()
    {
        return $this->belongsTo(\App\Models\Cliente::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function avisosenviados()
    {
        return $this->hasMany(\App\Models\AvisosEnviado::class);
    }
}
