<?php

/*
 * Desenvolvedores:
 * Fernando Fernandes
 * Evandro Carreira
 * Renato Gomes
 *
 */

namespace App\Http\Controllers;

use Auth;
use Flash;
use Response;
use Illuminate\Http\Request;
use App\Models\Cliente as Cliente;
use App\Models\Empresa as Empresa;
use App\Models\Titulo as Titulo;
use App\DataTables\AcordoDataTable;
use App\Repositories\AcordoRepository;
use App\DataTables\TituloDataTableModal;
use App\DataTables\ClienteDataTableModal;
use App\DataTables\EmpresaDataTableModal;
use App\Http\Requests\CreateAcordoRequest;
use App\Http\Requests\UpdateAcordoRequest;

class AcordoController extends AppBaseController
{
    /** @var AcordoRepository */
    private $acordoRepository;

    public function __construct(AcordoRepository $acordoRepo)
    {
        $this->acordoRepository = $acordoRepo;
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
        $input = $request->all();

        $acordo = $this->acordoRepository->create($input);

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
        $titulos = $aluno->titulos;

        //TO-DO: passar porcentagem do honorário!
        $valorTotalDivida = $this->acordoRepository->calculaValorDivida($empresa, $titulos);

        return $titulosDataTable->porAluno($aluno->id)->porEstado(['amarelo'])->render('acordos.create_final', ['aluno' => $aluno, 'titulos' => $titulos, 'empresa' => $empresa, 'valorTotalDivida' => $valorTotalDivida]);
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
    public function edit($id)
    {
        $acordo = $this->acordoRepository->findWithoutFail($id);

        if (empty($acordo)) {
            Flash::error('Acordo not found');

            return redirect(route('acordos.index'));
        }

        return view('acordos.edit')->with('acordo', $acordo);
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

        Flash::success('Acordo updated successfully.');

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
            Flash::error('Acordo not found');

            return redirect(route('acordos.index'));
        }

        $this->acordoRepository->delete($id);

        Flash::success('Acordo deleted successfully.');

        return redirect(route('acordos.index'));
    }
}
