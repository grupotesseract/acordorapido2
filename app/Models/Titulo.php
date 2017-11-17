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
use Carbon\Carbon as Carbon;

/**
 * Class Titulo.
 * @version August 1, 2017, 9:42 pm UTC
 */
class Titulo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'estado',
        'cliente_id',
        'empresa_id',
        'pago',
        'vencimento',
        'valor',
        'titulo',
        'ano',
        'desconto',
        'valordescontado',
        'importacao_id',
        'acordo',
        'acordo_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'estado' => 'string',
        'cliente_id' => 'integer',
        'empresa_id' => 'integer',
        'pago' => 'boolean',
        'vencimento' => 'date',
        'titulo' => 'string',
        'acordo' => 'string',
        'importacao_id' => 'integer',
        'ano' => 'integer',
        'desconto' => 'float',
        'valordescontado' => 'float',
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
    public function cliente()
    {
        return $this->belongsTo(\App\Models\Cliente::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function empresa()
    {
        return $this->belongsTo(\App\Models\Empresa::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function acordo()
    {
        return $this->belongsTo(\App\Models\Acordo::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function importacoes()
    {
        return $this->belongsToMany(\App\Models\Importacao::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function avisos()
    {
        return $this->hasMany(\App\Models\Aviso::class);
    }

    /**
     * Atribui pago para todos os que não foram importados no módulo Verde.
     */
    //TO-DO: DÁ PRA APAGAR ESSE MÉTODO
    public function ficaPago($obj)
    {
        $titulo = self::find($obj->id);
        $titulo->estado = 'verde';
        $titulo->save();
        $user = $titulo->cliente->user;
    }

    /**
     * scopePorEstado - Titulos por estado
     * ['azul', 'verde', 'amarelo', 'vermelho'].
     *
     * @param mixed $query
     * @param mixed $valor
     */
    public function scopePorEstado($query, $valor)
    {
        return $query->where('estado', $valor);
    }

    /**
     * scopePagos - Scope para facilitar a query pelos Titulos pagos.
     *
     * @param mixed $query
     */
    public function scopePagos($query)
    {
        return $query->where('pago', true);
    }

    /**
     * scopeAzuis Facilitar query dois titulos Azuis.
     *
     * @param mixed $query
     */
    public function scopeAzuis($query)
    {
        return $query->where('estado', 'azul');
    }

    /**
     * scopeVerdes Facilitar query dois titulos Verdes.
     *
     * @param mixed $query
     */
    public function scopeVerdes($query)
    {
        return $query->where('estado', 'verde');
    }

    /**
     * scopeAmarelos Facilitar query dois titulos Amarelos.
     *
     * @param mixed $query
     */
    public function scopeAmarelos($query)
    {
        return $query->where('estado', 'amarelo');
    }

    /**
     * scopeCinzas Facilitar query dois titulos Cinzas.
     *
     * @param mixed $query
     */
    public function scopeVermelhos($query)
    {
        return $query->where('estado', 'vermelho');
    }

    /**
     * scopeCinzas Facilitar query dois titulos Cinza.
     *
     * @param mixed $query
     */
    public function scopeCinzas($query)
    {
        return $query->where('estado', 'cinza');
    }

    /**
     * Accessor pra converter o campo Pago pra string.
     * @param  bool $value Situação do título
     * @return string        Descritivo dá situação do título
     */
    public function getPagoAttribute($value)
    {
        $pago = ($value) ? 'Pago' : 'Pendente';

        return $pago;
    }

    public function getVencimentoAttribute($value)
    {        
        return Carbon::parse($value)->format('d/m/Y');
    }   


    public function setVencimentoAttribute($value)
    {       

        $this->attributes['vencimento'] = Carbon::createFromFormat('d/m/Y', $value);
    }

    public function getValorAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }

    public function getValordescontadoAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }

    public function getDescontoAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }

    public function setValorAttribute($value)
    {
        $valorsemPonto = str_replace('.', '', $value);
        $this->attributes['valor'] = str_replace(',', '.', $valorsemPonto);
    }
}
