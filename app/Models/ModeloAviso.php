<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ModeloAviso.
 * @version August 3, 2017, 1:17 am UTC
 *
 * @method static ModeloAviso find($id=null, $columns = array())
 * @method static ModeloAviso|\Illuminate\Database\Eloquent\Collection findOrFail($id, $columns = ['*'])
 * @property int user_id
 * @property int empresa_id
 * @property string titulo
 * @property string mensagem
 */
class ModeloAviso extends Model
{
    use SoftDeletes;

    public $table = 'modelo_avisos';

    /**
     * The attributes that should be treated as \Carbon\Carbon instances.
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
        'titulo',
        'mensagem',
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
        'mensagem' => 'string',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * Retorna a Empresa a qual esse ModeloAviso esta relacionado.
     */
    public function empresa()
    {
        return $this->belongsTo('App\Models\Empresa');
    }

    /**
     * Retorna o User a qual esse ModeloAviso esta relacionado.
     */
    public function usuario()
    {
        return $this->belongsTo('App\Models\User');
    }
}
