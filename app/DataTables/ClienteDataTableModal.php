<?php

/*
 * Desenvolvedores:
 * Fernando Fernandes
 * Evandro Carreira
 * Renato Gomes
 *
 */

namespace App\DataTables;

use App\Models\Cliente;
use Yajra\Datatables\Services\DataTable;

class ClienteDataTableModal extends DataTable
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('selecionar', 'clientes.checkbox')
            ->rawColumns(['selecionar'])
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $clientes = Cliente::query();

        return $this->applyScopes($clientes);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->ajax('')
            ->parameters([
                'dom' => 'Bfrtip',
                'scrollX' => false,
                'buttons' => [
                    
                    [
                        'extend' => 'reload',
                        'text'    => '<i class="fa fa-refresh"></i> Atualizar',
                    ],
                    
                    [
                        'extend' => 'colvis',
                        'text'    => 'Filtrar Colunas',
                    ],
                ],
                'language' => ['url' => '//cdn.datatables.net/plug-ins/1.10.15/i18n/Portuguese-Brasil.json'],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            'selecionar' => ['name' => 'selecionar'],            
            'nome' => ['name' => 'nome', 'data' => 'nome'],
            //'user_id' => ['name' => 'user_id', 'data' => 'user_id'],
            'turma' => ['name' => 'turma', 'data' => 'turma'],
            'período' => ['name' => 'periodo', 'data' => 'periodo'],
            'responsável' => ['name' => 'responsavel', 'data' => 'responsavel'],
            'celular' => ['name' => 'celular', 'data' => 'celular'],
            /*'telefone' => ['name' => 'telefone', 'data' => 'telefone'],
            'telefone2' => ['name' => 'telefone2', 'data' => 'telefone2'],
            'celular2' => ['name' => 'celular2', 'data' => 'celular2'],*/
            'RA' => ['name' => 'ra', 'data' => 'ra'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'clientes';
    }
}
