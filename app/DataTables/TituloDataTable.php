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
        $titulos = Titulo::query();

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
                         'text'    => '<i class="fa fa-download"></i> Export',
                         'buttons' => [
                             'csv',
                             'excel',
                             'pdf',
                         ],
                    ],
                    'colvis',
                ],
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
            'cliente_id' => ['name' => 'cliente_id', 'data' => 'cliente_id'],
            'empresa_id' => ['name' => 'empresa_id', 'data' => 'empresa_id'],
            'pago' => ['name' => 'pago', 'data' => 'pago'],
            'vencimento' => ['name' => 'vencimento', 'data' => 'vencimento'],
            'valor' => ['name' => 'valor', 'data' => 'valor'],
            'titulo' => ['name' => 'titulo', 'data' => 'titulo'],
            'importacao_id' => ['name' => 'importacao_id', 'data' => 'importacao_id'],
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
