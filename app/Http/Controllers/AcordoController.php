<?php

//TO-DO - Limpar Controller e Concentrar métodos auxiliares nos repositorios!

namespace App\Http\Controllers;

use Auth;
use Flash;
use Response;
use Carbon\Carbon as Carbon;
use Illuminate\Http\Request;
use App\Models\Titulo as Titulo;
use App\Models\Cliente as Cliente;
use App\Models\Empresa as Empresa;
use App\DataTables\AcordoDataTable;
use App\Repositories\AcordoRepository;
use App\Repositories\TituloRepository;
use App\DataTables\TituloDataTableModal;
use App\DataTables\ClienteDataTableModal;
use App\DataTables\EmpresaDataTableModal;
use App\Repositories\HistoricoRepository;
use App\Http\Requests\CreateAcordoRequest;
use App\Http\Requests\UpdateAcordoRequest;
use App\Models\Parcelamento as Parcelamento;
use App\Repositories\ParcelamentoRepository;
use App\Repositories\LigacaoacordoRepository;
use App\Models\Ligacaoacordo as Ligacaoacordo;

class AcordoController extends AppBaseController
{
    /** @var AcordoRepository */
    private $acordoRepository;
    private $parcelamentoRepository;
    private $ligacaoacordoRepository;
    private $tituloRepository;
    private $historicoRepository;

    public function __construct(AcordoRepository $acordoRepo, ParcelamentoRepository $parcelamentoRepo, LigacaoacordoRepository $ligacaoacordoRepo, TituloRepository $tituloRepo, HistoricoRepository $historicoRepo)
    {
        $this->acordoRepository = $acordoRepo;
        $this->parcelamentoRepository = $parcelamentoRepo;
        $this->ligacaoacordoRepository = $ligacaoacordoRepo;
        $this->tituloRepository = $tituloRepo;
        $this->historicoRepository = $historicoRepo;
    }

    /**
     * Display a listing of the Acordo.
     *
     * @param AcordoDataTable $acordoDataTable
     * @return Response
     */
    public function index(AcordoDataTable $acordoDataTable, $status)
    {
        switch ($status) {

            case 'contatosemacordo':
                $situacao = 'Contato sem Acordo';
                break;

            default:
                $situacao = 'Acordo Feito';
                break;
        }

        return $acordoDataTable->porSituacao($situacao)->render('acordos.index');
    }

    /**
     * Display a listing of the Acordo for today.
     *
     * @param AcordoDataTable $acordoDataTable
     * @return Response
     */
    public function indexRetorno(AcordoDataTable $acordoDataTable, $status)
    {
        switch ($status) {

            case 'contatosemacordo':
                $situacao = 'Contato sem Acordo';
                break;

            default:
                $situacao = 'Acordo Feito';
                break;
        }

        $data = Carbon::now();

        return $acordoDataTable->porSituacaoDataRetorno($situacao, $data->toDateString())->render('acordos.index');
    }

    /**
     * Show the form for creating a new Acordo.
     *
     * @return Response
     */
    public function create(EmpresaDataTableModal $empresaDataTable)
    {
        $anos = array_unique(Titulo::where('retornoacordo', null)->pluck('ano')->toArray());

        foreach ($anos as $ano) {
            $array_anos[$ano] = $ano;
        }

        return $empresaDataTable->render('acordos.create_escolheempresa', ['anos' => $array_anos]);
    }

    public function escolheAluno(ClienteDataTableModal $clienteDataTable, $empresa, $ano)
    {
        $empresa_model = Empresa::find($empresa);
        $clientes = Titulo::where('empresa_id', $empresa)->where('retornoacordo', null)->where('ano', $ano)->pluck('cliente_id')->toArray();

        return $clienteDataTable->porCliente($clientes)->render('acordos.create_escolhealuno', ['empresa' => $empresa_model]);
    }

    /**
     * Store a newly created Acordo in storage.
     *
     * @param CreateAcordoRequest $request
     *
     * @return Response
     */
    public function store(CreateAcordoRequest $request)
    {
        $request->request->add(['user_id' => Auth::id()]);
        $request->request->add(['situacao' => $request->retornoacordo]);

        $input = $request->all();

        if ($input['retornoacordo'] == 'Acordo Feito') {
            foreach ($input['data'] as $key => $valor) {
                if (empty($valor) or empty($input['valor'][$key])) {
                    Flash::error('Favor, verificar se os campos de parcelamento foram preenchidos');

                    return redirect()->back()->withInput();
                    exit;
                }
            }
        }

        if (empty($input['duracao'])) {
            Flash::error('Favor, verificar se foi feita pelo menos uma ligação telefônica para este acordo');

            return redirect()->back()->withInput();
            exit;
        }

        $fillable = [
            'valoracordado',
            'valororiginal',
            'observacao',
            'situacao',
            'user_id',
            'cliente_id',
            'empresa_id',
            'data_retorno',
        ];

        $camposAcordo = array_filter(
            $input,
            function ($key) use ($fillable) {
                return in_array($key, $fillable);
            },
            ARRAY_FILTER_USE_KEY
        );

        $acordo = $this->acordoRepository->create($camposAcordo);

        if ($input['retornoacordo'] == 'Acordo Feito') {
            foreach ($input['parcela'] as $key => $valor) {
                $parcela = $this->parcelamentoRepository->create([
                    'numparcela' => $valor,
                    'dataparcela' => Carbon::createFromFormat('d/m/Y', $input['data'][$key]),
                    'situacao' => 'Pendente',
                    'valorparcela' => $input['valor'][$key],
                    'acordo_id' => $acordo->id,
                ]);
            }
        }

        foreach ($input['titulos'] as $titulo) {
            $tituloRepo = $this->tituloRepository->update(
                [
                    'retornoacordo' => $input['retornoacordo'],
                    'acordo_id' => $acordo->id,
                ], $titulo);
        }

        if (! empty($input['duracao'])) {
            foreach ($input['duracao'] as $key => $valor) {
                $ligacao = $this->ligacaoacordoRepository->create([
                    'duracao' => $valor,
                    'datahora' => $input['datahora'][$key],
                    'acordo_id' => $acordo->id,
                ]);
            }
        }

        $historico = $this->historicoRepository->create([
            'user_id' => Auth::id(),
            'tipo' => 'Inserção - '.$input['retornoacordo'],
        ]);

        if ($input['retornoacordo'] == 'Acordo Feito') {
            Flash::success('Acordo salvo com sucesso.');
        } else {
            Flash::success('Contato salvo com sucesso');
        }

        //return redirect(route('acordos.index', ['status' => strtolower($input['retornoacordo'])]));
        $status = str_replace(' ', '', strtolower($input['retornoacordo']));

        return redirect()->action(
            'AcordoController@index', ['status' => strtolower($status)]
        );
    }

    /**
     * Salva o aluno escolhido e passa para a tela final do acordo.
     *
     * @param CreateAcordoRequest $request
     *
     * @return Response
     */
    public function storealuno(Request $request)
    {
        $input = $request->all();

        return redirect(route('acordofinal', ['aluno' => $input['aluno'], 'empresa' => $input['empresa']]));
    }

    /**
     * Salva a empresa escolhida e passa pra próxima tela.
     * @param  Request $request Empresa escolhida
     * @return Redirect           Vai pra próxima tela
     */
    public function storeempresa(Request $request)
    {
        $input = $request->all();

        return redirect(route('escolhealuno', ['empresa' => $input['empresa'], 'ano' => $input['ano']]));
    }

    public function finalizarAcordo(TituloDataTableModal $titulosDataTable, $aluno, $empresa)
    {
        $aluno = Cliente::find($aluno);
        $empresa = Empresa::find($empresa);

        $titulos = Titulo::where(['cliente_id' => $aluno->id])->where(['empresa_id' => $empresa->id])->get();

        $valorTotalDivida = $this->acordoRepository->calculaValorDivida($empresa, $titulos);
        $valorTotalDesconto = $this->acordoRepository->calculaValorTotalDesconto($empresa, $titulos);

        $valorTotalBruto = $this->acordoRepository->calculaValorTotalBruto($empresa, $titulos);

        $valorTotalDescontado = $this->acordoRepository->calculaValorTotalDescontado($empresa, $titulos);

        $valorTotalCobranca = $this->acordoRepository->calculaValorTotalCobranca($empresa, $titulos);

        $valorTotalReferencia = $this->acordoRepository->calculaValorTotalReferencia($empresa, $titulos);

        return $titulosDataTable->porAluno($aluno->id)->porEmpresa($empresa->id)->porEstado(['amarelo'])->render('acordos.create_final', ['aluno' => $aluno, 'titulos' => $titulos, 'empresa' => $empresa, 'valorTotalDivida' => $valorTotalDivida, 'valorTotalDesconto' => $valorTotalDesconto, 'valorTotalBruto' => $valorTotalBruto, 'valorTotalDescontado' => $valorTotalDescontado, 'valorTotalCobranca' => $valorTotalCobranca, 'valorTotalReferencia' => $valorTotalReferencia]);
    }

    /**
     * Display the specified Acordo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $acordo = $this->acordoRepository->findWithoutFail($id);

        if (empty($acordo)) {
            Flash::error('Acordo not found');

            return redirect(route('acordos.index'));
        }

        return view('acordos.show')->with('acordo', $acordo);
    }

    /**
     * Show the form for editing the specified Acordo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit(TituloDataTableModal $titulosDataTable, $id)
    {
        $acordo = $this->acordoRepository->findWithoutFail($id);
        $aluno = $acordo->cliente;
        $empresa = $acordo->empresa;
        $parcelas = $acordo->parcelamentos;
        $ligacoes = $acordo->ligacaoacordos;
        /*$titulos = Titulo::where(['cliente_id' => $aluno->id])->where(['empresa_id' => $empresa->id])->get();*/
        $titulos = $acordo->titulos;

        if (empty($acordo)) {
            Flash::error('Acordo não encontrado');

            return redirect(route('acordos.index'));
        }

        $valorTotalDivida = $this->acordoRepository->calculaValorDivida($empresa, $titulos);

        $valorTotalDivida = $this->acordoRepository->calculaValorDivida($empresa, $titulos);
        $valorTotalDesconto = $this->acordoRepository->calculaValorTotalDesconto($empresa, $titulos);

        $valorTotalBruto = $this->acordoRepository->calculaValorTotalBruto($empresa, $titulos);

        $valorTotalDescontado = $this->acordoRepository->calculaValorTotalDescontado($empresa, $titulos);

        $valorTotalCobranca = $this->acordoRepository->calculaValorTotalCobranca($empresa, $titulos);

        $valorTotalReferencia = $this->acordoRepository->calculaValorTotalReferencia($empresa, $titulos);

        return $titulosDataTable->porAcordo($acordo->id)->render('acordos.edit_final', ['aluno' => $aluno, 'empresa' => $empresa, 'acordo' => $acordo, 'parcelas' => $parcelas, 'ligacoes' => $ligacoes, 'valorTotalDivida' => $valorTotalDivida, 'valorTotalDesconto' => $valorTotalDesconto, 'valorTotalBruto' => $valorTotalBruto, 'valorTotalDescontado' => $valorTotalDescontado, 'valorTotalCobranca' => $valorTotalCobranca, 'valorTotalReferencia' => $valorTotalReferencia]);
    }

    /**
     * Update the specified Acordo in storage.
     *
     * @param  int              $id
     * @param UpdateAcordoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAcordoRequest $request)
    {
        $request->request->add(['situacao' => $request->retornoacordo]);
        $request->request->add(['user_id' => Auth::id()]);

        $acordo = $this->acordoRepository->findWithoutFail($id);

        if (empty($acordo)) {
            Flash::error('Acordo not found');

            return redirect(route('acordos.index'));
        }

        $acordo = $this->acordoRepository->update($request->all(), $id);

        $input = $request->all();
        if ($input['retornoacordo'] == 'Acordo Feito') {
            foreach ($input['data'] as $key => $valor) {
                if (empty($valor) or empty($input['valor'][$key])) {
                    Flash::error('Favor, verificar se os campos de parcelamento foram preenchidos');

                    return redirect()->back()->withInput();
                    exit;
                }
            }
        }

        $ligacoesDeletadas = ligacaoacordo::where('acordo_id', $acordo->id)->delete();

        $parcelamentoDeletados = Parcelamento::where('acordo_id', $acordo->id)->delete();

        if ($input['retornoacordo'] == 'Acordo Feito') {
            foreach ($input['parcela'] as $key => $valor) {
                $parcela = $this->parcelamentoRepository->create([
                    'numparcela' => $valor,
                    'dataparcela' => Carbon::createFromFormat('d/m/Y', $input['data'][$key]),
                    'situacao' => 'Pendente',
                    'valorparcela' => $input['valor'][$key],
                    'acordo_id' => $acordo->id,
                ]);
            }
        }

        foreach ($input['duracao'] as $key => $valor) {
            $ligacao = $this->ligacaoacordoRepository->create([
                'duracao' => $valor,
                'datahora' => $input['datahora'][$key],
                'acordo_id' => $acordo->id,
            ]);
        }

        $historico = $this->historicoRepository->create([
            'user_id' => Auth::id(),
            'tipo' => 'Atualização - '.$input['retornoacordo'],
        ]);

        Flash::success('Acordo atualizado com sucesso');

        //return redirect(route('acordos.index'));
        $status = str_replace(' ', '', strtolower($input['retornoacordo']));

        return redirect()->action(
            'AcordoController@index', ['status' => strtolower($status)]
        );
    }

    /**
     * Remove the specified Acordo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $acordo = $this->acordoRepository->findWithoutFail($id);

        if (empty($acordo)) {
            Flash::error('Acordo não encontrado');

            return redirect(route('acordos.index'));
        }

        $titulosDeletados = Titulo::where('acordo_id', $acordo->id)->update(['acordo_id' => null, 'retornoacordo' => null]);

        $ligacoesDeletadas = ligacaoacordo::where('acordo_id', $acordo->id)->delete();

        $parcelamentoDeletados = Parcelamento::where('acordo_id', $acordo->id)->delete();

        $this->acordoRepository->delete($id);

        Flash::success('Acordo excluído com sucesso.');

        return redirect()->back();
    }
}
