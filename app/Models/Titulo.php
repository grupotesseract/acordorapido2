<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Titulo
 * @package App\Models
 * @version August 1, 2017, 9:42 pm UTC
 */
class Titulo extends Model
{
    public $table = 'titulos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'estado',
        'cliente_id',
        'empresa_id',
        'pago',
        'vencimento',
        'valor',
        'titulo',
        'importacao_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'estado' => 'string',
        'cliente_id' => 'integer',
        'empresa_id' => 'integer',
        'pago' => 'boolean',
        'vencimento' => 'date',
        'titulo' => 'string',
        'importacao_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cliente()
    {
        return $this->belongsTo(\App\Models\Cliente::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function empresa()
    {
        return $this->belongsTo(\App\Models\Empresa::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function importaco()
    {
        return $this->belongsTo(\App\Models\Importaco::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function avisos()
    {
        return $this->hasMany(\App\Models\Aviso::class);
    }
}
