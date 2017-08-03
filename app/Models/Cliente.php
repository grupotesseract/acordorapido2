<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Cliente.
 * @version August 1, 2017, 9:17 pm UTC
 */
class Cliente extends Model
{
    public $table = 'clientes';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

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
        'rg',
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
        'rg' => 'string',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [

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
}
