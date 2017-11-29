<?php

/*
 * Desenvolvedores:
 * Fernando Fernandes
 * Evandro Carreira
 * Renato Gomes
 *
 */

namespace App\DataTables;

use App\Models\Titulo;
use Yajra\Datatables\Services\DataTable;

class TituloDataTableModal extends DataTable
{
    protected $estado;
    protected $aluno;

    public function porEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    public function porAluno($aluno)
    {
        $this->aluno = $aluno;

        return $this;
    }

    public function porEmpresa($empresa)
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('avisos', 'titulos.operacoes')
            ->addColumn('selecionar', 'titulos.checkbox')
            ->addColumn('calculado', 'titulos.valorcalculado')
            ->rawColumns(['avisos', 'selecionar', 'calculado'])
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $titulos = Titulo::query()->where('cliente_id', $this->aluno)->where('empresa_id', $this->empresa)->whereIn('estado', $this->estado)->with('empresa')->with('cliente')->with('avisos.avisosenviados.user');

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
            'selecionar' => ['name' => 'selecionar', 'title' => 'Marcar'],
            'ano' => ['name' => 'ano', 'data' => 'ano'],
            'escola' => ['name' => 'empresa.nome', 'data' => 'empresa.nome'],
            'módulo' => ['name' => 'estado', 'data' => 'estado'],
            'titulo' => ['name' => 'titulo', 'data' => 'titulo'],
            'vencimento' => ['name' => 'vencimento', 'data' => 'vencimento'],
            'valor' => ['name' => 'valor', 'data' => 'valor', 'title' => 'Valor Bruto'],
            'desconto' => ['name' => 'desconto', 'data' => 'desconto'],
            'valordescontado' => ['name' => 'valordescontado', 'data' => 'valordescontado', 'title' => 'Valor Líquido'],
            'calculado' => ['name' => 'calculado', 'title' => 'Valor Atualizado', 'data' => 'calculado'],
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
