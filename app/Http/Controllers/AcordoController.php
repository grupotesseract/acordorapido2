<?php

//TO-DO - Limpar Controller e Concentrar métodos auxiliares nos repositorios!

namespace App\Http\Controllers;

use Auth;
use Flash;
use Response;
use Carbon\Carbon as Carbon;
use Illuminate\Http\Request;
use App\Models\Titulo as Titulo;
use App\Models\Parcelamento as Parcelamento;
use App\Models\Ligacaoacordo as Ligacaoacordo;
use App\Models\Cliente as Cliente;
use App\Models\Empresa as Empresa;
use App\DataTables\AcordoDataTable;
use App\Repositories\AcordoRepository;
use App\DataTables\TituloDataTableModal;
use App\DataTables\ClienteDataTableModal;
use App\DataTables\EmpresaDataTableModal;
use App\Http\Requests\CreateAcordoRequest;
use App\Http\Requests\UpdateAcordoRequest;
use App\Repositories\ParcelamentoRepository;
use App\Repositories\LigacaoacordoRepository;
use \Carbon\Carbon as Carbon;

class AcordoController extends AppBaseController
{
    /** @var AcordoRepository */
    private $acordoRepository;
    private $parcelamentoRepository;
    private $ligacaoacordoRepository;


    public function __construct(AcordoRepository $acordoRepo, ParcelamentoRepository $parcelamentoRepo, LigacaoacordoRepository $ligacaoacordoRepo)
    {
        $this->acordoRepository = $acordoRepo;
        $this->parcelamentoRepository = $parcelamentoRepo;
        $this->ligacaoacordoRepository = $ligacaoacordoRepo;

    }

    /**
     * Display a listing of the Acordo.
     *
     * @param AcordoDataTable $acordoDataTable
     * @return Response
     */
    public function index(AcordoDataTable $acordoDataTable)
    {
        return $acordoDataTable->render('acordos.index');
    }

    /**
     * Show the form for creating a new Acordo.
     *
     * @return Response
     */
    public function create(EmpresaDataTableModal $empresaDataTable)
    {
        return $empresaDataTable->render('acordos.create_escolheempresa');
    }

    public function escolheAluno(ClienteDataTableModal $clienteDataTable, $empresa)
    {
        $empresa_model = Empresa::find($empresa);
        $clientes = Titulo::where('empresa_id', $empresa)->pluck('cliente_id')->toArray();

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
        $request->request->add(['situacao' => 'Pendente']);
        $input = $request->all();

        foreach ($input['data'] as $key => $valor) {
            if (empty($valor) OR empty($input['valor'][$key])) {

                Flash::error('Favor, verificar se os campos de parcelamento foram preenchidos');
                return redirect()->back()->withInput();
                exit;
            }
        }

        $acordo = $this->acordoRepository->create($input);

        foreach ($input['parcela'] as $key => $valor) {
            $parcela = $this->parcelamentoRepository->create([
                'numparcela' => $valor,
                'dataparcela' => Carbon::createFromFormat('d/m/Y', $input['data'][$key]),
                'situacao' => 'Pendente',
                'valorparcela' => $input['valor'][$key],
                'acordo_id' => $acordo->id,
            ]);
        }

        foreach ($input['duracao'] as $key => $valor) {
            $ligacao = $this->ligacaoacordoRepository->create([
                'duracao' => $valor,
                'datahora' => $input['datahora'][$key],                
                'acordo_id' => $acordo->id
            ]);
        }
        

        $titulos = Titulo::where(['cliente_id' => $input['cliente_id']])->where(['empresa_id' => $input['empresa_id']])->update(['acordo' => 'Acordo Feito - Pendente Pagamento', 'acordo_id' => $acordo->id]);


        Flash::success('Acordo salvo com sucesso.');

        return redirect(route('acordos.index'));
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

        return redirect(route('escolhealuno', ['empresa' => $input['empresa']]));
    }

    public function finalizarAcordo(TituloDataTableModal $titulosDataTable, $aluno, $empresa)
    {
        $aluno = Cliente::find($aluno);
        $empresa = Empresa::find($empresa);

        $titulos = Titulo::where(['cliente_id' => $aluno->id])->where(['empresa_id' => $empresa->id])->get();

        //TO-DO: passar porcentagem do honorário!
        $valorTotalDivida = $this->acordoRepository->calculaValorDivida($empresa, $titulos);

        return $titulosDataTable->porAluno($aluno->id)->porEmpresa($empresa->id)->porEstado(['amarelo'])->render('acordos.create_final', ['aluno' => $aluno, 'titulos' => $titulos, 'empresa' => $empresa, 'valorTotalDivida' => $valorTotalDivida]);
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
        $titulos = Titulo::where(['cliente_id' => $aluno->id])->where(['empresa_id' => $empresa->id])->get();

        if (empty($acordo)) {
            Flash::error('Acordo não encontrado');

            return redirect(route('acordos.index'));
        }
        
        return $titulosDataTable->porAluno($aluno->id)->porEstado(['amarelo'])->porEmpresa($empresa->id)->render('acordos.edit_final', ['aluno' => $aluno, 'empresa' => $empresa, 'acordo' => $acordo, 'parcelas' => $parcelas, 'ligacoes' => $ligacoes]);
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
        $acordo = $this->acordoRepository->findWithoutFail($id);

        if (empty($acordo)) {
            Flash::error('Acordo not found');

            return redirect(route('acordos.index'));
        }

        $acordo = $this->acordoRepository->update($request->all(), $id);

        $input = $request->all();
        foreach ($input['data'] as $key => $valor) {
            if (empty($valor) OR empty($input['valor'][$key])) {

                Flash::error('Favor, verificar se os campos de parcelamento foram preenchidos');
                return redirect()->back()->withInput();
                exit;
            }
        }
        
        $ligacoesDeletadas = ligacaoacordo::where('acordo_id',$acordo->id)->delete();        

        $parcelamentoDeletados = Parcelamento::where('acordo_id',$acordo->id)->delete();

        foreach ($input['parcela'] as $key => $valor) {
            $parcela = $this->parcelamentoRepository->create([
                'numparcela' => $valor,
                'dataparcela' => Carbon::createFromFormat('d/m/Y', $input['data'][$key]),
                'situacao' => 'Pendente',
                'valorparcela' => $input['valor'][$key],
                'acordo_id' => $acordo->id
            ]);
        }

        foreach ($input['duracao'] as $key => $valor) {
            $ligacao = $this->ligacaoacordoRepository->create([
                'duracao' => $valor,
                'datahora' => $input['datahora'][$key],                
                'acordo_id' => $acordo->id
            ]);
        }
        

        $titulos = Titulo::where(['cliente_id' => $input['cliente_id']])->where(['empresa_id' => $input['empresa_id']])->update(['acordo' => 'Acordo Feito - Pendente Pagamento', 'acordo_id' => $acordo->id]);

        Flash::success('Acordo atualizado com sucesso');

        return redirect(route('acordos.index'));
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

        $titulosDeletados = Titulo::where('acordo_id',$acordo->id)->update(['acordo_id' => NULL, 'acordo' => NULL]);        

        $ligacoesDeletadas = ligacaoacordo::where('acordo_id',$acordo->id)->delete();        

        $parcelamentoDeletados = Parcelamento::where('acordo_id',$acordo->id)->delete();

        $this->acordoRepository->delete($id);

        Flash::success('Acordo excluído com sucesso.');

        return redirect(route('acordos.index'));
    }
}
