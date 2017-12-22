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
        $valortotal = 0;
        foreach ($titulos as $titulo) {
            $valor = str_replace('.', '', $titulo->calculado);
            $valortotal += str_replace(',', '.', $valor);
        }

        return number_format($valortotal, 2, ',', '.');
    }

    public function calculaValorTotalDesconto($empresa, $titulos)
    {
        $valortotal = 0;
        foreach ($titulos as $titulo) {
            $valor = str_replace('.', '', $titulo->desconto);
            $valortotal += str_replace(',', '.', $valor);
        }

        return number_format($valortotal, 2, ',', '.');
    }

    public function calculaValorTotalBruto($empresa, $titulos)
    {
        $valortotal = 0;
        foreach ($titulos as $titulo) {
            $valor = str_replace('.', '', $titulo->valor);
            $valortotal += str_replace(',', '.', $valor);
        }

        return number_format($valortotal, 2, ',', '.');
    }

    public function calculaValorTotalDescontado($empresa, $titulos)
    {
        $valortotal = 0;
        foreach ($titulos as $titulo) {
            $valor = str_replace('.', '', $titulo->valordescontado);
            $valortotal += str_replace(',', '.', $valor);
        }

        return number_format($valortotal, 2, ',', '.');
    }

    public function calculaValorTotalCobranca($empresa, $titulos)
    {
        $valortotal = 0;
        foreach ($titulos as $titulo) {
            $valortotal += $titulo->calculadohonorariobrutosemformato;
        }

        return $valortotal;
    }
}
