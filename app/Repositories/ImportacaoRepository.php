<?php

/*
 * Desenvolvedores:
 * Fernando Fernandes
 * Evandro Carreira
 * Renato Gomes
 *
 */

namespace App\Repositories;

use App\Models\Importacao;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ImportacaoRepository.
 * @version August 3, 2017, 1:06 am UTC
 *
 * @method Importacao findWithoutFail($id, $columns = ['*'])
 * @method Importacao find($id, $columns = ['*'])
 * @method Importacao first($columns = ['*'])
 */
class ImportacaoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'empresa_id',
        'modulo',
    ];

    /**
     * Configure the Model.
     **/
    public function model()
    {
        return Importacao::class;
    }
}
