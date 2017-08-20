<?php

namespace App\Repositories;

use App\Models\Titulo;
use InfyOm\Generator\Common\BaseRepository;

class TituloRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'estado',
        'cliente_id',
        'empresa_id',
        'pago',
        'vencimento',
        'valor',
        'titulo',
        'importacao_id',
    ];

    /**
     * Configure the Model.
     **/
    public function model()
    {
        return Titulo::class;
    }

    /**
     * Atualiza para pago todos os titulos que não foram importados para o módulo VERDE.
     *
     * @param number $empresa ID da Empresa
     */
    public function atualizaPagantes($estado,$empresa_id, $titulosimportados)


    {      

        /**
         * O $estado diz respeito a qual estado está sendo feita a importação
         * Logo, deveremos tratar os pagantes do módulo anterior
         */
        switch ($estado) {
            case 'azul':
            case 'verde':
                $estado_pagantes = 'azul';                    
                break;
            case 'amarelo':
                $estado_pagantes = 'verde';                   
                break;
            case 'vermelho':
                $estado_pagantes = 'amarelo';                   
                break;
        }

        
        Titulo::where('empresa_id', $empresa_id)
              ->where('estado', $estado_pagantes)
              ->where('pago', false)
              ->whereNotIn('id', $titulosimportados)
              ->update(['pago' => true]);
    }
}
