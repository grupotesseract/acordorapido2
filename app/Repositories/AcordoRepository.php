<?php

/*
 * Desenvolvedores:
 * Fernando Fernandes
 * Evandro Carreira
 * Renato Gomes
 *
 */

namespace App\Repositories;

use App\Models\Acordo;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AcordoRepository.
 * @version October 3, 2017, 11:16 pm BRT
 *
 * @method Acordo findWithoutFail($id, $columns = ['*'])
 * @method Acordo find($id, $columns = ['*'])
 * @method Acordo first($columns = ['*'])
 */
class AcordoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'valoracordado',
        'valororiginal',
        'observacao',
        'user_id',
        'cliente_id',
        'empresa_id',
    ];

    /**
     * Configure the Model.
     **/
    public function model()
    {
        return Acordo::class;
    }

    public function calculaValorDivida($empresa, $titulos)
    {
        //
    }
}
