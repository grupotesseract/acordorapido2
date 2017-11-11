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
use Carbon\Carbon as Carbon;
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
            //CALCULAR DIFERENÇA DE DIAS ENTRE HOJE E A DATA DE VENCIMENTO
            $vencimento = Carbon::createFromFormat('d/m/Y', $titulo->vencimento);
            $hoje = Carbon::now();

            $diff = $vencimento->diffInDays($hoje);
            $taxa = ($empresa->multadiariaporc) / 100;
            $valorTitulo = str_replace(',', '.', str_replace('.', '', $titulo->valordescontado));

            $valorAposVencimento = $valorTitulo * ($empresa->multaporc / 100);

            $potencia = pow(1 + $taxa, $diff);
            $valortotal += $valorAposVencimento + ($valorTitulo * $potencia);
        }

        return number_format($valortotal, 2, ',', '.');
    }
}
