<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Parcelamento.
 * @version November 16, 2017, 8:24 pm BRST
 *
 * @property \App\Models\Acordo acordo
 * @property \Illuminate\Database\Eloquent\Collection importacaoTitulo
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property int numparcela
 * @property decimal valorparcela
 * @property date dataparcela
 * @property string situacao
 * @property int acordo_id
 */
class Parcelamento extends Model
{
    public $table = 'parcelamentos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['dataparcela'];

    public $fillable = [
        'numparcela',
        'valorparcela',
        'dataparcela',
        'situacao',
        'acordo_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'numparcela' => 'integer',
        'dataparcela' => 'date',
        'valorparcela' => 'float',
        'situacao' => 'string',
        'acordo_id' => 'integer',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'numparcela' => 'required:min:1',
        'dataparcela' => 'required',
        'valorparcela' => 'required',
        'situacao' => 'required',
        'acordo_id' => 'required',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function acordo()
    {
        return $this->belongsTo(\App\Models\Acordo::class);
    }

    public function setValorparcelaAttribute($value)
    {
        $valorsemPonto = str_replace('.', '', $value);
        $this->attributes['valorparcela'] = str_replace(',', '.', $valorsemPonto);
    }

    public function getValorparcelaAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }

    public function setDataparcelaAtrribute($date)
    {
        $this->attributes['dataparcela'] = Carbon::createFromFormat('d/m/Y', $date);
    }
}
