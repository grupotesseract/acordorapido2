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
 * Class Contato.
 * @version September 21, 2017, 10:43 pm BRT
 *
 * @property string nome
 * @property string email
 * @property string escola
 * @property string mensagem
 */
class Contato extends Model
{
    use SoftDeletes;

    public $table = 'contatos';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'nome',
        'email',
        'escola',
        'mensagem',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nome' => 'string',
        'email' => 'string',
        'escola' => 'string',
        'mensagem' => 'string',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'required',
        'email' => 'required',
        'escola' => 'required',
        'mensagem' => 'required',
    ];
}
