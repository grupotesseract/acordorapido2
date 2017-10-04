<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Acordo
 * @package App\Models
 * @version October 3, 2017, 11:16 pm BRT
 *
 * @property decimal valoracordado
 * @property decimal valororiginal
 * @property string observacao
 * @property integer user_id
 * @property integer cliente_id
 * @property integer empresa_id
 */
class Acordo extends Model
{
    use SoftDeletes;

    public $table = 'acordos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'valoracordado',
        'valororiginal',
        'observacao',
        'user_id',
        'cliente_id',
        'empresa_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'observacao' => 'string',
        'user_id' => 'integer',
        'cliente_id' => 'integer',
        'empresa_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'valoracordado' => 'required:min:1',
        'valororiginal' => 'required',
        'observacao' => 'required'
    ];

    
}
