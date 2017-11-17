<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Ligacaoacordo
 * @package App\Models
 * @version November 16, 2017, 11:49 pm BRST
 *
 * @property \App\Models\Acordo acordo
 * @property \Illuminate\Database\Eloquent\Collection importacaoTitulo
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property integer acordo_id
 * @property string duracao
 * @property string datahora
 */
class Ligacaoacordo extends Model
{

    public $table = 'ligacaoacordos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    public $fillable = [
        'acordo_id',
        'duracao',
        'datahora'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'acordo_id' => 'integer',
        'duracao' => 'string',
        'datahora' => 'string'
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
    public function acordo()
    {
        return $this->belongsTo(\App\Models\Acordo::class);
    }
}
