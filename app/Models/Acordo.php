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
 * Class Acordo.
 * @version October 3, 2017, 11:16 pm BRT
 *
 * @property decimal valoracordado
 * @property decimal valororiginal
 * @property string observacao
 * @property int user_id
 * @property int cliente_id
 * @property int empresa_id
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
        'situacao',
        'user_id',
        'cliente_id',
        'empresa_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'observacao' => 'string',
        'situacao' => 'string',
        'user_id' => 'integer',
        'cliente_id' => 'integer',
        'empresa_id' => 'integer',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'valoracordado' => 'required:min:1',
        'valororiginal' => 'required',
        'observacao' => 'required',
        'cliente_id' => 'required',
        'empresa_id' => 'required',
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
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function empresa()
    {
        return $this->belongsTo(\App\Models\Empresa::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     **/
    public function parcelamentos()
    {
        return $this->hasMany(\App\Models\Parcelamento::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     **/
    public function titulos()
    {
        return $this->hasMany(\App\Models\Titulo::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     **/
    public function ligacaoacordos()
    {
        return $this->hasMany(\App\Models\Ligacaoacordo::class);
    }

    public function setValoracordadoAttribute($value)
    {
        $valorsemPonto = str_replace('.', '', $value);
        $this->attributes['valoracordado'] = str_replace(',', '.', $valorsemPonto);
    }

    public function setValororiginalAttribute($value)
    {
        $valorsemPonto = str_replace('.', '', $value);
        $this->attributes['valororiginal'] = str_replace(',', '.', $valorsemPonto);
    }

    public function getValororiginalAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }

}
