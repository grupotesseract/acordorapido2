<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class AvisosEnviado.
 * @version August 3, 2017, 12:29 am UTC
 *
 * @method static AvisosEnviado find($id=null, $columns = array())
 * @method static AvisosEnviado|\Illuminate\Database\Eloquent\Collection findOrFail($id, $columns = ['*'])
 * @property int user_id
 * @property int aviso_id
 * @property int tipodeaviso
 * @property int status
 * @property string estado
 */
class AvisoEnviado extends Model
{
    public $table = 'avisos_enviados';

    /**
     * The attributes that should be treated as \Carbon\Carbon instances
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'user_id',
        'aviso_id',
        'tipodeaviso',
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
        'user_id' => 'integer',
        'aviso_id' => 'integer',
        'tipodeaviso' => 'integer',
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
     * Retorna o Aviso a qual esse AvisoEnviado esta associado
     */
    public function aviso()
    {
        return $this->belongsTo('App\Models\Aviso');
    }

    /**
     * Retorna o usuario assoaciado a esse AvisoEnviado
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * scopePorEstado - Titulos por estado
     * ['azul', 'verde', 'amarelo', 'vermelho']
     *
     * @param mixed $query
     * @param mixed $valor
     */
    public function scopePorEstado($query, $valor)
    {
        return $query->where('estado', $valor);
    }
    
    /**
     * Scope para pegar os de tipodeaviso SMS (0)
     *
     * @param mixed $query
     */
    public function scopeSmss($query)
    {
        return $query->where('tipodeaviso', 0);
    }

    /**
     * Scope para pegar os de tipodeaviso Ligacao telefonica (1)
     *
     * @param mixed $query
     */
    public function scopeLigacoes($query)
    {
        return $query->where('tipodeaviso', 1);
    }

}
