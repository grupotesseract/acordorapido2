<?php

namespace App\Repositories;

use App\Models\Empresa;
use InfyOm\Generator\Common\BaseRepository;

class EmpresaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'user_id',
        'cidade',
        'estado',
    ];

    /**
     * Configure the Model.
     **/
    public function model()
    {
        return Empresa::class;
    }
}
