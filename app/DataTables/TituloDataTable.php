<?php

namespace App\DataTables;

use App\Models\Titulo;
use Yajra\Datatables\Services\DataTable;

class TituloDataTable extends DataTable
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'titulos.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $titulos = Titulo::query()->with('empresa')->with('cliente');

        return $this->applyScopes($titulos);
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
            ->addAction(['width' => '10%'])
            ->ajax('')
            ->parameters([
                'dom' => 'Bfrtip',
                'scrollX' => false,
                'buttons' => [
                    'print',
                    'reset',
                    'reload',
                    [
                         'extend'  => 'collection',
                         'text'    => '<i class="fa fa-download"></i> Exportar',
                         'buttons' => [
                             'csv',
                             'excel',
                             'pdf',
                         ],
                    ],
                    'colvis',
                ],
                'language' => ['url' => '//cdn.datatables.net/plug-ins/1.10.15/i18n/Portuguese-Brasil.json']
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
            'estado' => ['name' => 'estado', 'data' => 'estado'],
            'aluno' => ['name' => 'cliente_id', 'data' => 'cliente.nome'],
            'empresa' => ['name' => 'empresa_id', 'data' => 'empresa.nome'],
            'pago' => ['name' => 'pago', 'data' => 'pago'],
            'vencimento' => ['name' => 'vencimento', 'data' => 'vencimento'],
            'valor' => ['name' => 'valor', 'data' => 'valor'],
            'titulo' => ['name' => 'titulo', 'data' => 'titulo'],

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'titulos';
    }
}
