<?php

namespace App\Repositories;

use App\Models\PermUserEmpresa;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PermUserEmpresaRepository.
 * @version October 18, 2017, 9:17 pm BRST
 *
 * @method PermUserEmpresa findWithoutFail($id, $columns = ['*'])
 * @method PermUserEmpresa find($id, $columns = ['*'])
 * @method PermUserEmpresa first($columns = ['*'])
 */
class PermUserEmpresaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'empresa_id',
        'ano',
    ];

    /**
     * Configure the Model.
     **/
    public function model()
    {
        return PermUserEmpresa::class;
    }
}
