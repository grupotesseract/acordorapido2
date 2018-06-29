<?php

/*
 * Desenvolvedores:
 * Fernando Fernandes
 * Evandro Carreira
 * Renato Gomes
 *
 */

namespace App\DataTables;

use App\Models\Acordo;
use Yajra\Datatables\Services\DataTable;

class AcordoDataTable extends DataTable
{
    protected $situacao;

    public function porSituacao($situacao)
    {
        $this->situacao = $situacao;

        return $this;
    }

    public function porSituacaoDataRetorno($situacao, $data_retorno)
    {
        $this->situacao = $situacao;
        $this->data_retorno = $data_retorno;

        return $this;
    }

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
        if (isset($this->data_retorno)) {
            $acordos = Acordo::query()->where('situacao', $this->situacao)->where('data_retorno', '<=', $this->data_retorno)->with('cliente')->with('empresa')->with(['user' => function ($query) {
                $query->withTrashed();
            }]);
        } else {
            $acordos = Acordo::query()->where('situacao', $this->situacao)->with('cliente')->with('empresa')->with(['user' => function ($query) {
                $query->withTrashed();
            }]);
        }

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
            ->addAction(['width' => '10%', 'title'=> 'Ação'])
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
            'operador' => ['name' => 'user.name', 'data' => 'user.name'],
            'situacao' => ['name' => 'situacao', 'data' => 'situacao', 'title' => 'Situação'],
            'aluno' => ['name' => 'cliente.nome', 'data' => 'cliente.nome'],
            'empresa' => ['name' => 'empresa.nome', 'data' => 'empresa.nome'],
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
