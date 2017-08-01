<?php

namespace App\Repositories;

use App\Models\Titulo;
use InfyOm\Generator\Common\BaseRepository;

class TituloRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'estado',
        'cliente_id',
        'empresa_id',
        'pago',
        'vencimento',
        'valor',
        'titulo',
        'importacao_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Titulo::class;
    }
}
