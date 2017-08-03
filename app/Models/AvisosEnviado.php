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
class AvisosEnviado extends Model
{
    public $table = 'avisos_enviados';

    protected $dates = ['deleted_at'];

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
}
