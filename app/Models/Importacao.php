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

    /**
     * Pega o usuário que realizou a importação.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Traz empresa a qual a importação está associada.
     * @return \App\Empresa Model de Empresa
     */
    public function empresa()
    {
        return $this->belongsTo('App\Empresa');
    }

    /**
     * Pega os titulos da importação.
     */
    public function titulos()
    {
        return $this->belongsToMany('App\Titulo');
    }

    /**
     * Traz contagem de títulos de uma Importação.
     * @return Collection Títulos agrupados por Importação
     */
    public function titulosCount()
    {
        return $this->hasMany('App\Titulo')
        ->selectRaw('importacao_id, count(*) as aggregate')
        ->groupBy('importacao_id');
    }

    /**
     * TODO - Explicar o que é isso.
     * @return [type] [description]
     */
    public function getTitulosCountAttribute()
    {
        // if relation is not loaded already, let's do it first
        if (! array_key_exists('titulosCount', $this->relations)) {
            $this->load('titulosCount');
        }

        $related = $this->getRelation('titulosCount');

        // then return the count directly
        return ($related) ? (int) $related->aggregate : 0;
    }
}
