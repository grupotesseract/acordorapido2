<?php

namespace App\DataTables;

use App\Models\Empresa;
use Yajra\Datatables\Services\DataTable;

class EmpresaCrudUsersDataTable extends DataTable
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('selecionar', 'empresas.checkbox')
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
        //aqui vamos precisar filtrar para nao ser todas as empresas, ou por scopes da datatable
        $empresas = Empresa::with('usuarios');

        return $this->applyScopes($empresas);
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
                'buttons' => [],
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
            'selecionar' => ['name' => 'selecionar', 'orderable'=>false, 'searchable' => false],
            'nome' => ['name' => 'nome', 'data' => 'nome', 'orderable'=>false],
            'cidade' => ['name' => 'cidade', 'data' => 'cidade', 'orderable'=>false],
            'estado' => ['name' => 'estado', 'data' => 'estado', 'orderable'=>false],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'empresas';
    }
}
