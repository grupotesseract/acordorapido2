<?php

namespace App\Repositories;

use App\Models\AvisosEnviado;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AvisosEnviadoRepository
 * @package App\Repositories
 * @version August 3, 2017, 12:29 am UTC
 *
 * @method AvisosEnviado findWithoutFail($id, $columns = ['*'])
 * @method AvisosEnviado find($id, $columns = ['*'])
 * @method AvisosEnviado first($columns = ['*'])
*/
class AvisosEnviadoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'aviso_id',
        'tipodeaviso',
        'status',
        'estado'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AvisosEnviado::class;
    }
}
