<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PermUserEmpresa
 * @package App\Models
 * @version October 18, 2017, 9:17 pm BRST
 *
 * @property \App\Models\User user
 * @property \App\Models\Empresa empresa
 * @property integer user_id
 * @property integer empresa_id
 * @property integer ano
 */
class PermUserEmpresa extends Model
{
    use SoftDeletes;

    public $table = 'perm_user_empresas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'empresa_id',
        'ano'
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
        'ano' => 'integer'
    ];

    /**
     * Validation rules
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function empresa()
    {
        return $this->belongsTo(\App\Models\Empresa::class);
    }
}
