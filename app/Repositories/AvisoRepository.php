<?php

namespace App\Repositories;

use App\Models\Aviso;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AvisoRepository.
 * @version August 2, 2017, 11:09 pm UTC
 *
 * @method Aviso findWithoutFail($id, $columns = ['*'])
 * @method Aviso find($id, $columns = ['*'])
 * @method Aviso first($columns = ['*'])
 */
class AvisoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'titulo',
        'texto',
        'user_id',
        'cliente_id',
        'titulo_id',
        'status',
        'estado',
    ];

    /**
     * Configure the Model.
     **/
    public function model()
    {
        return Aviso::class;
    }
}
