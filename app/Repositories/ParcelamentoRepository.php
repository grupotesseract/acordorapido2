<?php

namespace App\Repositories;

use App\Models\Parcelamento;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ParcelamentoRepository.
 * @version November 16, 2017, 8:24 pm BRST
 *
 * @method Parcelamento findWithoutFail($id, $columns = ['*'])
 * @method Parcelamento find($id, $columns = ['*'])
 * @method Parcelamento first($columns = ['*'])
 */
class ParcelamentoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'numparcela',
        'valorparcela',
        'dataparcela',
        'situacao',
        'acordo_id',
    ];

    /**
     * Configure the Model.
     **/
    public function model()
    {
        return Parcelamento::class;
    }
}
