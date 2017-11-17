<?php

namespace App\Repositories;

use App\Models\Ligacaoacordo;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class LigacaoacordoRepository.
 * @version November 16, 2017, 11:49 pm BRST
 *
 * @method Ligacaoacordo findWithoutFail($id, $columns = ['*'])
 * @method Ligacaoacordo find($id, $columns = ['*'])
 * @method Ligacaoacordo first($columns = ['*'])
 */
class LigacaoacordoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'acordo_id',
        'duracao',
        'datahora',
    ];

    /**
     * Configure the Model.
     **/
    public function model()
    {
        return Ligacaoacordo::class;
    }
}
