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

/**
 * Class Empresa.
 * @version August 1, 2017, 9:37 pm UTC
 */
class Empresa extends Model
{
    public $table = 'empresas';

    /**
     * The attributes that should be treated as \Carbon\Carbon instances.
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
        'nome',
        'user_id',
        'cidade',
        'estado',
        'multaporc',
        'multadiariaporc',
        'responsavel',
        'email',
        'telefone',
        'honorario_intensivo',
        'honorario_cobranca',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nome' => 'string',
        'user_id' => 'integer',
        'cidade' => 'string',
        'estado' => 'string',
        'multaporc' => 'integer',
        'multadiariaporc' => 'float',
        'responsavel' => 'string',
        'email' => 'string',
        'telefone' => 'string',
        'honorario_intensivo' => 'integer',
        'honorario_cobranca' => 'integer',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'required',
        'cidade' => 'required',
        'estado' => 'required',
        'multaporc' => 'required',
        'multadiariaporc' => 'required',
        'responsavel' => 'required',
        'email' => 'required|email',
        'telefone' => 'required',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function titulos()
    {
        return $this->hasMany(\App\Models\Titulo::class);
    }

    public function importacoes()
    {
        return $this->hasMany(\App\Models\Importacao::class);
    }

    public function acordos()
    {
        return $this->hasMany(\App\Models\Acordo::class);
    }

    public function setMultaporcAttribute($value)
    {
        $valorsemPonto = str_replace('.', '', $value);
        $this->attributes['multaporc'] = str_replace(',', '.', $valorsemPonto);
    }

    public function setMultadiariaporcAttribute($value)
    {
        $valorsemPonto = str_replace('.', '', $value);
        $this->attributes['multadiariaporc'] = str_replace(',', '.', $valorsemPonto);
    }
}
