<?php

/*
 * Desenvolvedores:
 * Fernando Fernandes
 * Evandro Carreira
 * Renato Gomes
 *
 */

namespace App\Repositories;

use App\Models\Cliente;
use InfyOm\Generator\Common\BaseRepository;

class ClienteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Configure the Model.
     **/
    public function model()
    {
        return Cliente::class;
    }
}
