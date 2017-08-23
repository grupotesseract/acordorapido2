<?php

namespace App\Http\Controllers;

use App\DataTables\AvisoDataTable;
use App\Http\Requests;
use Illuminate\Http\Request;

use App\Http\Requests\CreateAvisoRequest;
use App\Http\Requests\UpdateAvisoRequest;
use App\Repositories\AvisoRepository;
use App\Repositories\AvisosEnviadoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Auth;

class AvisoController extends AppBaseController
{
    /** @var  AvisoRepository */
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
     * Envia SMS
     * @param  integer $aviso_id id do aviso
     * @return Response           volta a página anterior
     */
    public function enviaSMS($aviso_id)
    {
        $aviso = $this->avisoRepository->find($aviso_id);

        $retorno = $this->avisoRepository->enviarAviso([
            'to'     => $aviso->cliente->celular,
            'titulo' => $aviso->tituloaviso,
            'texto'  => $aviso->texto,
            'id'     => $aviso->cliente->id,
        ]);

        if ($retorno == '200') {
            $aviso->status = $aviso->status + 1;
            Flash::success('Aviso enviado com sucesso.');
        }
        else
            Flash::error('O Aviso não foi enviado. Verifique o número do celular do Aluno');
                

        $aviso->save();
        $this->avisoEnviadoRepository->create([
            'user_id' => Auth::id(),
            'aviso_id' => $aviso->id,
            'estado' => $aviso->estado,
            'tipodeaviso' => 0,
            'status' => $retorno            
        ]);


        return redirect(route('avisos.index'));

    }

    public function enviarLoteAviso(Request $request) 
    {
        foreach ($request->id as $key => $value) {
            $aviso = $this->avisoRepository->find($value);
            $retorno = $this->avisoRepository->enviarAviso([
                'to'     => $aviso->cliente->celular,
                'titulo' => $aviso->tituloaviso,
                'texto'  => $aviso->texto,
                'id'     => $aviso->cliente->id,
            ]);

            if ($retorno == '200') {
                $aviso->status = $aviso->status + 1;
            }
            else
                $houveerro = 'true';

            $this->avisoEnviadoRepository->create([
                'user_id' => Auth::id(),
                'aviso_id' => $aviso->id,
                'estado' => $aviso->estado,
                'tipodeaviso' => 0,
                'status' => $retorno            
            ]);    

            $aviso->save();            
        }

        if (!isset($houveerro)) {
            Flash::success('Avisos enviados com sucesso.');
        }
        else
            Flash::error('Um ou mais avisos não foram enviados! Verifique os números de celular dos Alunos');
       
        return redirect(route('avisos.index'));
    }
}
