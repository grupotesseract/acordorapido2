<?php

namespace App\DataTables;

use App\Models\Aviso;
use Yajra\Datatables\Services\DataTable;

class AvisoDataTable extends DataTable
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('selecionar', 'avisos.checkbox')
            ->addColumn('total', 'avisos.totalavisos')
            ->addColumn('action', 'avisos.datatables_actions')
            ->rawColumns(['selecionar', 'action'])
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $avisos = Aviso::query()->where('cliente_id', '<>', null)->with(['titulo.empresa', 'cliente']);

        return $this->applyScopes($avisos);
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
            ->addAction(['width' => '20%', 'title' => 'Ação'])
            ->ajax('')
            ->parameters([
                'dom' => 'Bfrtip',
                'scrollX' => false,
                'buttons' => [
                    [
                        'extend' => 'print',
                        'text'    => '<i class="fa fa-print"></i> Imprimir',
                    ],
                    [
                        'extend' => 'reload',
                        'text'    => '<i class="fa fa-refresh"></i> Atualizar',
                    ],
                    [
                         'extend'  => 'collection',
                         'text'    => '<i class="fa fa-download"></i> Exportar',
                         'buttons' => [
                             'csv',
                             'excel',
                         ],
                    ],
                    [
                        'selecionarTodos',
                    ],
                    [
                        'enviarMarcados',
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
            'módulo' => ['name' => 'estado', 'data' => 'estado'],
            'escola' => ['name' => 'titulo.empresa.nome', 'data' => 'titulo.empresa.nome'],
            'nomealuno' => ['name' => 'cliente.nome', 'data' => 'cliente.nome', 'title' => 'Aluno'],
            'telaluno' => ['name' => 'cliente.telefone', 'data' => 'cliente.telefone', 'title' => 'Telefone'],
            'respaluno' => ['name' => 'cliente.responsavel', 'data' => 'cliente.responsavel', 'title' => 'Responsavel'],
            'título' => ['name' => 'tituloaviso', 'data' => 'tituloaviso'],
            'mensagem' => ['name' => 'texto', 'data' => 'texto'],
            'total' => ['name' => 'status'],

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'avisos';
    }

    public function enviaMarcados()
    {
        return 'test';
    }
}
