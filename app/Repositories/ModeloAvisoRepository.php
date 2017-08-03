<?php

namespace App\Repositories;

use App\Models\ModeloAviso;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ModeloAvisoRepository
 * @package App\Repositories
 * @version August 3, 2017, 1:17 am UTC
 *
 * @method ModeloAviso findWithoutFail($id, $columns = ['*'])
 * @method ModeloAviso find($id, $columns = ['*'])
 * @method ModeloAviso first($columns = ['*'])
*/
class ModeloAvisoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'empresa_id',
        'titulo',
        'mensagem'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ModeloAviso::class;
    }
}
