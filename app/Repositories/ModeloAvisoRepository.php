<?php

namespace App\Repositories;

use App\Models\ModeloAviso;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ModeloAvisoRepository.
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
        'mensagem',
    ];

    /**
     * Configure the Model.
     **/
    public function model()
    {
        return ModeloAviso::class;
    }

    public function parametrizaAviso($estado, $empresa, $vencimento = null)
    {
        $modeloaviso = ModeloAviso::where('tipo', ucfirst($estado))->where('empresa_id', $empresa)->get()->first();

        if (! $modeloaviso) {
            return false;
        }

        $modelo_aviso_final['mensagem'] = str_replace('[escola]', $modeloaviso->empresa->nome, $modeloaviso['mensagem']);

        if ($vencimento) {
            $modelo_aviso_final['mensagem'] = str_replace('[vencimento]', $vencimento, $modelo_aviso_final['mensagem']);
        }

        $modelo_aviso_final['titulo'] = $modeloaviso['titulo'];

        return $modelo_aviso_final;
    }
}
