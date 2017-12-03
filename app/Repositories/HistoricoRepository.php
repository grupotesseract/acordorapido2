<?php

namespace App\Repositories;

use App\Models\Historico;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class HistoricoRepository.
 * @version December 3, 2017, 7:57 pm BRST
 *
 * @method Historico findWithoutFail($id, $columns = ['*'])
 * @method Historico find($id, $columns = ['*'])
 * @method Historico first($columns = ['*'])
 */
class HistoricoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'tipo',
    ];

    /**
     * Configure the Model.
     **/
    public function model()
    {
        return Historico::class;
    }
}
