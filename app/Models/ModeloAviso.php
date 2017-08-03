<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ModeloAviso
 * @package App\Models
 * @version August 3, 2017, 1:17 am UTC
 *
 * @method static ModeloAviso find($id=null, $columns = array())
 * @method static ModeloAviso|\Illuminate\Database\Eloquent\Collection findOrFail($id, $columns = ['*'])
 * @property integer user_id
 * @property integer empresa_id
 * @property string titulo
 * @property string mensagem
 */
class ModeloAviso extends Model
{
    use SoftDeletes;

    public $table = 'modelo_avisos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'empresa_id',
        'titulo',
        'mensagem'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'empresa_id' => 'integer',
        'titulo' => 'string',
        'mensagem' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
