<?php

namespace App\Http\Controllers;

use Auth;
use Flash;
use Redirect;
use Response;
use Illuminate\Http\Request;
use App\Models\Titulo as Titulo;
use App\Models\Cliente as Cliente;
use App\Models\Empresa as Empresa;
use App\DataTables\TituloDataTable;
use Maatwebsite\Excel\Facades\Excel;
use App\Repositories\AvisoRepository;
use App\Repositories\TituloRepository;
use App\Models\Importacao as Importacao;
use App\Http\Requests\CreateTituloRequest;
use App\Http\Requests\UpdateTituloRequest;
use App\Repositories\ModeloAvisoRepository;

class TituloController extends AppBaseController
{
    /** @var TituloRepository */
    private $tituloRepository;

    public function __construct(TituloRepository $tituloRepo, AvisoRepository $avisoRepository, ModeloAvisoRepository $modeloAvisoRepository)
    {
        $this->tituloRepository = $tituloRepo;
        $this->avisoRepository = $avisoRepository;
        $this->modeloAvisoRepository = $modeloAvisoRepository;

        $this->middleware('auth');
    }

    /**
     * Display a listing of the Titulo.
     *
     * @param TituloDataTable $tituloDataTable
     * @return Response
     */
    public function index(TituloDataTable $tituloDataTable)
    {
        return $tituloDataTable->render('titulos.index');
    }

    /**
     * Show the form for creating a new Titulo.
     *
     * @return Response
     */
    public function create()
    {
        return view('titulos.create');
    }

    /**
     * Store a newly created Titulo in storage.
     *
     * @param CreateTituloRequest $request
     *
     * @return Response
     */
    public function store(CreateTituloRequest $request)
    {
        $input = $request->all();

        $titulo = $this->tituloRepository->create($input);

        Flash::success('Titulo saved successfully.');

        return redirect(route('titulos.index'));
    }

    /**
     * Display the specified Titulo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $titulo = $this->tituloRepository->findWithoutFail($id);

        if (empty($titulo)) {
            Flash::error('Titulo not found');

            return redirect(route('titulos.index'));
        }

        return view('titulos.show')->with('titulo', $titulo);
    }

    /**
     * Show the form for editing the specified Titulo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $titulo = $this->tituloRepository->findWithoutFail($id);

        if (empty($titulo)) {
            Flash::error('Titulo not found');

            return redirect(route('titulos.index'));
        }

        return view('titulos.edit')->with('titulo', $titulo);
    }

    /**
     * Update the specified Titulo in storage.
     *
     * @param  int              $id
     * @param UpdateTituloRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTituloRequest $request)
    {
        $titulo = $this->tituloRepository->findWithoutFail($id);

        if (empty($titulo)) {
            Flash::error('Titulo not found');

            return redirect(route('titulos.index'));
        }

        $titulo = $this->tituloRepository->update($request->all(), $id);

        Flash::success('Titulo updated successfully.');

        return redirect(route('titulos.index'));
    }

    /**
     * Remove the specified Titulo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $titulo = $this->tituloRepository->findWithoutFail($id);

        if (empty($titulo)) {
            Flash::error('Titulo not found');

            return redirect(route('titulos.index'));
        }

        $this->tituloRepository->delete($id);

        Flash::success('Titulo deleted successfully.');

        return redirect(route('titulos.index'));
    }

    /**
     * View para a importação.
     * @param  string $estado Estado para o qual vai fazer importação
     * @return void
     */
    public function importacao($estado)
    {
        $escolas = Empresa::all();

        return view('importacaos.importar')->with(['estado'=> $estado, 'escolas' => $escolas]);
    }

    /**
     * Importação da Planilha.
     * @param  CreateTituloRequest $request validação da Request
     * @param  string              $estado  Estado do Título (cor)
     * @return void                View com as importações feitas
     */
    public function importa(CreateTituloRequest $request, $estado)
    {
        $importacao = Importacao::create(['user_id' => Auth::id(), 'modulo' => $estado, 'empresa_id' => $request->escola]);
        $importacao_id = $importacao->id;
        $empresa_id = $request->escola;

        //TODO - AQUI DEVE SER PARAMETRIZADO A MENSAGEM POR ESTADO E ESCOLA
        $retorno = $this->modeloAvisoRepository->parametrizaAviso($estado, $empresa_id);

        if (! $retorno) {
            \Session::flash('flash_message_error', true);
            \Session::flash('flash_message', 'Antes de efetuar uma importação, você deve cadastrar os avisos que serão enviados para essa escola! Vá em Avisos->Modelo de Avisos');

            return Redirect::to('/importacao/'.$estado);
            exit;
        }

        $titulos_importados = [];

        Excel::load($request->file('excel'), function ($reader) use ($estado,$empresa_id,$importacao_id,&$titulos_importados,$retorno) {
            $reader->each(function ($sheet) use ($estado,$empresa_id,$importacao_id,&$titulos_importados,$retorno) {
                $cliente = Cliente::firstOrNew(['rg' => $sheet->rg]);
                $cliente->nome = $sheet->nome;
                $cliente->user_id = Auth::id();
                $cliente->turma = $sheet->turma;
                $cliente->periodo = $sheet->periodo;
                $cliente->responsavel = $sheet->responsavel;
                $cliente->celular = $sheet->celular;
                $cliente->telefone = $sheet->telefone;
                $cliente->telefone2 = $sheet->telefone2;
                $cliente->celular2 = $sheet->celular2;
                $cliente->rg = $sheet->rg;
                $cliente->save();
                $cliente_id = $cliente->id;

                $titulo = Titulo::firstOrNew(['titulo' => $sheet->titulo, 'empresa_id' => $empresa_id]);
                $titulo->cliente_id = $cliente_id;
                $titulo->empresa_id = $empresa_id;
                $titulo->pago = false;
                $titulo->vencimento = $sheet->vencimento;
                $titulo->valor = $sheet->valor;
                $titulo->titulo = $sheet->titulo;
                $titulo->estado = $estado;
                $titulo->save();
                $titulos_importados[] = $titulo->id;

                //criar registro na tabela pivot
                $titulo->importacoes()->attach($importacao_id);

                $vencimento = date('d-m-Y', strtotime(str_replace('-', '/', $titulo->vencimento)));

                $user_id = Auth::id();
                $escola = Empresa::find($empresa_id)->nome;

                if (count($this->avisoRepository->findWhere(['titulo_id'  => $titulo->id, 'estado' => $estado])->toArray()) == 0) {
                    $this->avisoRepository->create(
                        [
                            'tituloaviso' => $retorno['titulo'],
                            'texto'      => str_replace('[vencimento]', $vencimento, $retorno['mensagem']),
                            'user_id'    => Auth::id(),
                            'cliente_id' => $cliente_id,
                            'status'     => 0,
                            'estado'     => $estado,
                            'titulo_id'  => $titulo->id,
                        ]

                    );
                }
            });
        });

        //TODO: CONFIRMAR COM EDILSON
        if ($estado == 'verde' or $estado == 'azul') {
            $this->tituloRepository->atualizaPagantes($estado, $empresa_id, $titulos_importados);
        }

        \Session::flash('flash_message_success', true);
        \Session::flash('flash_message', 'Títulos importados com sucesso!');

        $titulos = Titulo::whereIn('id', $titulos_importados)->with('avisos')->get();
        $escolas = Empresa::all();

        return view('importacaos.importar')->with(['estado'=> $estado, 'escolas' => $escolas, 'titulos' => $titulos]);
    }
}
