<?php

namespace App\Repositories;

use App\Models\Contato;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ContatoRepository.
 * @version September 21, 2017, 10:43 pm BRT
 *
 * @method Contato findWithoutFail($id, $columns = ['*'])
 * @method Contato find($id, $columns = ['*'])
 * @method Contato first($columns = ['*'])
 */
class ContatoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'email',
        'escola',
        'mensagem',
    ];

    /**
     * Configure the Model.
     **/
    public function model()
    {
        return Contato::class;
    }
}
