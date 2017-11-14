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
 * Class Cliente.
 * @version August 1, 2017, 9:17 pm UTC
 */
class Cliente extends Model
{
    use SoftDeletes;
    public $table = 'clientes';

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
        'nome',
        'user_id',
        'turma',
        'periodo',
        'responsavel',
        'celular',
        'telefone',
        'telefone2',
        'celular2',
        'ra',
        'negativado',
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
        'turma' => 'string',
        'periodo' => 'string',
        'responsavel' => 'string',
        'celular' => 'string',
        'telefone' => 'string',
        'telefone2' => 'string',
        'celular2' => 'string',
        'ra' => 'string',
        'negativado' => 'boolean',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'required',
        'turma' => 'required',
        'periodo' => 'required',
        'responsavel' => 'required',
        'ra' => 'required',
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function avisos()
    {
        return $this->hasMany(\App\Models\Aviso::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function acordos()
    {
        return $this->hasMany(\App\Models\Acordo::class);
    }
    
}
