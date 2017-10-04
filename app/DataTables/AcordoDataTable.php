<?php

namespace App\DataTables;

use App\Models\Acordo;
use Form;
use Yajra\Datatables\Services\DataTable;

class AcordoDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'acordos.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $acordos = Acordo::query();

        return $this->applyScopes($acordos);
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
                    'colvis'
                ]
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
            'valoracordado' => ['name' => 'valoracordado', 'data' => 'valoracordado'],
            'valororiginal' => ['name' => 'valororiginal', 'data' => 'valororiginal'],
            'observacao' => ['name' => 'observacao', 'data' => 'observacao'],
            'user_id' => ['name' => 'user_id', 'data' => 'user_id'],
            'cliente_id' => ['name' => 'cliente_id', 'data' => 'cliente_id'],
            'empresa_id' => ['name' => 'empresa_id', 'data' => 'empresa_id']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'acordos';
    }
}
