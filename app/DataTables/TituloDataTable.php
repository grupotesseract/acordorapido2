<?php

namespace App\DataTables;

use App\Models\Titulo;
use Yajra\Datatables\Services\DataTable;

class TituloDataTable extends DataTable
{
    protected $estado;

    public function porEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'titulos.datatables_actions')
            ->addColumn('avisos', 'titulos.operacoes')
            ->rawColumns(['avisos', 'action'])
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        /*$titulos = Titulo::query()->where('estado', $this->estado)->with('empresa')->with('cliente')->with(['avisos.avisosenviados' => function ($query) {
            $query->where('status', '>=', 1)->with('user');
        }]);*/

        $titulos = Titulo::query()->where('estado', $this->estado)->with('empresa')->with('cliente')->with('avisos.avisosenviados.user');

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
            ->addAction(['width' => '10%', 'title' => 'Ação'])
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
                             'pdf',
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
            'empresa' => ['name' => 'empresa_id', 'data' => 'empresa.nome'],
            'titulo' => ['name' => 'titulo', 'data' => 'titulo'],
            'aluno' => ['name' => 'cliente_id', 'data' => 'cliente.nome', 'searchable' => true],
            'estado' => ['name' => 'estado', 'data' => 'estado'],
            'pago' => ['name' => 'pago', 'data' => 'pago'],
            'vencimento' => ['name' => 'vencimento', 'data' => 'vencimento'],
            'valor' => ['name' => 'valor', 'data' => 'valor'],
            'avisos' => ['name' => 'avisos', 'title' => 'Operações Efetuadas'],

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
