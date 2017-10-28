<?php

namespace App\DataTables;

use App\Models\PermUserEmpresa;
use Form;
use Yajra\Datatables\Services\DataTable;

class PermUserEmpresaDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'perm_user_empresas.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $permUserEmpresas = PermUserEmpresa::with('empresa')
            ->select('empresas.nome as nome', 'perm_user_empresas.id as id', 'perm_user_empresas.ano as ano');

        return $this->applyScopes($permUserEmpresas);
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
            ->addAction(['width' => '10%', 'title' => 'Ação'])
            ->ajax('')
            ->parameters([
                'dom' => 'Bfrtip',
                'scrollX' => false,
                'buttons' => []
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
            'empresa' => ['name' => 'empresa.nome', 'data' => 'nome', 'title' => 'Empresa'],
            'ano' => ['name' => 'ano', 'data' => 'ano']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'permUserEmpresas';
    }
}
