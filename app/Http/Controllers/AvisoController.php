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
use App\DataTables\AvisoDataTable;
use App\Repositories\AvisoRepository;
use App\Http\Requests\CreateAvisoRequest;
use App\Http\Requests\UpdateAvisoRequest;
use App\Repositories\AvisosEnviadoRepository;

class AvisoController extends AppBaseController
{
    /** @var AvisoRepository */
    private $avisoRepository;

    public function __construct(AvisoRepository $avisoRepo, AvisosEnviadoRepository $avisoEnviadoRepo)
    {
        $this->avisoRepository = $avisoRepo;
        $this->avisoEnviadoRepository = $avisoEnviadoRepo;
    }

    /**
     * Display a listing of the Aviso.
     *
     * @param AvisoDataTable $avisoDataTable
     * @return Response
     */
    public function index(AvisoDataTable $avisoDataTable)
    {
        return $avisoDataTable->render('avisos.index');
    }

    /**
     * Show the form for creating a new Aviso.
     *
     * @return Response
     */
    public function create()
    {
        return view('avisos.create');
    }

    /**
     * Store a newly created Aviso in storage.
     *
     * @param CreateAvisoRequest $request
     *
     * @return Response
     */
    public function store(CreateAvisoRequest $request)
    {
        $input = $request->all();

        $aviso = $this->avisoRepository->create($input);

        Flash::success('Aviso salvo com sucesso.');

        return redirect(route('avisos.index'));
    }

    /**
     * Display the specified Aviso.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $aviso = $this->avisoRepository->findWithoutFail($id);

        if (empty($aviso)) {
            Flash::error('Aviso não encontrado');

            return redirect(route('avisos.index'));
        }

        return view('avisos.show')->with('aviso', $aviso);
    }

    /**
     * Show the form for editing the specified Aviso.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $aviso = $this->avisoRepository->findWithoutFail($id);

        if (empty($aviso)) {
            Flash::error('Aviso não encontrado');

            return redirect(route('avisos.index'));
        }

        return view('avisos.edit')->with('aviso', $aviso);
    }

    /**
     * Update the specified Aviso in storage.
     *
     * @param  int              $id
     * @param UpdateAvisoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAvisoRequest $request)
    {
        $aviso = $this->avisoRepository->findWithoutFail($id);

        if (empty($aviso)) {
            Flash::error('Aviso não encontrado');

            return redirect(route('avisos.index'));
        }

        $aviso = $this->avisoRepository->update($request->all(), $id);

        Flash::success('Aviso atualizado com sucesso.');

        return redirect(route('avisos.index'));
    }

    /**
     * Remove the specified Aviso from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $aviso = $this->avisoRepository->findWithoutFail($id);

        if (empty($aviso)) {
            Flash::error('Aviso não encontrado');

            return redirect(route('avisos.index'));
        }

        $this->avisoRepository->delete($id);

        Flash::success('Aviso apagado com sucesso.');

        return redirect(route('avisos.index'));
    }

    /**
     * Envia SMS.
     * @param  int $aviso_id id do aviso
     * @return Response           volta a página anterior
     */
    public function enviaSMS($aviso_id)
    {
        $aviso = $this->avisoRepository->find($aviso_id);

        $retorno = $this->avisoRepository->enviarAviso([
            'to'     => $aviso->cliente->celular,
            'tituloaviso' => $aviso->tituloaviso,
            'texto'  => $aviso->texto,
            'id'     => $aviso->cliente->id,
        ]);

        if ($retorno == '200') {
            $aviso->status = $aviso->status + 1;
            Flash::success('Aviso enviado com sucesso.');
        } else {
            Flash::error('O Aviso não foi enviado. Verifique o número do celular do Aluno');
        }

        $aviso->save();
        $this->avisoEnviadoRepository->create([
            'user_id' => Auth::id(),
            'aviso_id' => $aviso->id,
            'estado' => $aviso->estado,
            'tipodeaviso' => 0,
            'status' => $retorno,
        ]);

        return redirect(route('avisos.index'));
    }

    /**
     * Envia lote de avisos de uma só vez.
     * @param  Request $request Request contendo os ID´s dos avisos
     * @return Response           Volta para a tela de avisos
     */
    public function enviarLoteAviso(Request $request)
    {
        if (! $request->id) {
            Flash::error('Nenhum Aviso selecionado.');

            return redirect()->back();
        }

        foreach ($request->id as $key => $value) {
            $aviso = $this->avisoRepository->find($value);
            $retorno = $this->avisoRepository->enviarAviso([
                'to'     => $aviso->cliente->celular,
                'tituloaviso' => $aviso->tituloaviso,
                'texto'  => $aviso->texto,
                'id'     => $aviso->cliente->id,
            ]);

            if ($retorno == '200') {
                $aviso->status = $aviso->status + 1;
            } else {
                $houveerro = 'true';
            }

            $this->avisoEnviadoRepository->create([
                'user_id' => Auth::id(),
                'aviso_id' => $aviso->id,
                'estado' => $aviso->estado,
                'tipodeaviso' => 0,
                'status' => $retorno,
            ]);

            $aviso->save();
        }

        if (! isset($houveerro)) {
            Flash::success('Avisos enviados com sucesso.');
        } else {
            Flash::error('Um ou mais avisos não foram enviados! Verifique os números de celular dos Alunos');
        }

        return redirect(route('avisos.index'));
    }

    public function salvaLigacao(Request $request)
    {
        $aviso = $this->avisoRepository->find($request->aviso_id);

        $this->avisoEnviadoRepository->create([
                'user_id' => Auth::id(),
                'aviso_id' => $aviso->id,
                'estado' => $aviso->estado,
                'tipodeaviso' => 1,
                'status' => '1',
                'observacaoligacao' => $request->observacaoligacao,
                'tempoligacao' => $request->tempoligacao[0],
            ]);

        $aviso->status = $aviso->status + 1;
        $aviso->save();

        Flash::success('Ligação telefônica salva com sucesso');

        return redirect(route('avisos.index'));
    }

    /**
     * Envia SMS manualmente.
     * @param  Request $request Conteúdo da Mensagem
     * @return Response Volta para página anterior
     */
    public function enviarAviso(Request $request)
    {
        $aviso = $this->avisoRepository->create($request->all());

        $request->request->add(['id' => $aviso->id]);

        $retorno = $this->avisoRepository->enviarAviso($request->all());

        $this->avisoEnviadoRepository->create([
            'user_id' => Auth::id(),
            'aviso_id' => $aviso->id,
            'estado' => 'nenhum',
            'tipodeaviso' => 1,
            'status' => $retorno,
        ]);

        //TRATAR RETORNO
        if ($retorno = '200') {
            return redirect()->back()->with('message', 'SMS enviado com sucesso!');
        } else {
            return redirect()->back()->with('message', 'Houve algum erro ao enviar o SMS. Código do erro '.$retorno);
        }
    }
}
