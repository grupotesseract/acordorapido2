<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Historico.
 * @version December 3, 2017, 7:57 pm BRST
 *
 * @property int user_id
 * @property string tipo
 */
class Historico extends Model
{
    use SoftDeletes;

    public $table = 'historicos';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'user_id',
        'tipo',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'tipo' => 'string',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'tipo' => 'required',
    ];

    /**
     * Pega o usuario desse usuario.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
