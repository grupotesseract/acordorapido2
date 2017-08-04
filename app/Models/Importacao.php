<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Importacao.
 * @version August 3, 2017, 1:06 am UTC
 *
 * @method static Importacao find($id=null, $columns = array())
 * @method static Importacao|\Illuminate\Database\Eloquent\Collection findOrFail($id, $columns = ['*'])
 * @property int user_id
 * @property int empresa_id
 * @property string modulo
 */
class Importacao extends Model
{
    use SoftDeletes;

    public $table = 'importacoes';

    /**
     * The attributes that should be treated as \Carbon\Carbon instances
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'user_id',
        'empresa_id',
        'modulo',
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
        'modulo' => 'string',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [

    ];
}
