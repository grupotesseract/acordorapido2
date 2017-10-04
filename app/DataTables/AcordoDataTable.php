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
        $acordos = Acordo::query()->with('cliente')->with('empresa')->with('user');

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
            ->addAction(['width' => '10%','title'=> 'Ação'])
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
            'valoracordado' => ['name' => 'valoracordado', 'data' => 'valoracordado', 'title' => 'Valor Negociado'],
            'valororiginal' => ['name' => 'valororiginal', 'data' => 'valororiginal', 'title' => 'Valor Original'],
            'observação' => ['name' => 'observacao', 'data' => 'observacao'],
            'operador' => ['name' => 'user_id', 'data' => 'user.name'],
            'aluno' => ['name' => 'cliente_id', 'data' => 'cliente.nome'],
            'empresa' => ['name' => 'empresa_id', 'data' => 'empresa.nome']
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
