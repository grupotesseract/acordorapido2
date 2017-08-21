<?php

namespace App\Http\Controllers;

use Auth;
use Flash;
use Response;
use App\Repositories\EmpresaRepository;
use App\DataTables\ModeloAvisoDataTable;
use App\Repositories\ModeloAvisoRepository;
use App\Http\Requests\CreateModeloAvisoRequest;
use App\Http\Requests\UpdateModeloAvisoRequest;

class ModeloAvisoController extends AppBaseController
{
    /** @var ModeloAvisoRepository */
    private $modeloAvisoRepository;

    public function __construct(ModeloAvisoRepository $modeloAvisoRepo, EmpresaRepository $empresaRepository)
    {
        $this->modeloAvisoRepository = $modeloAvisoRepo;
        $this->empresaRepository = $empresaRepository;
    }

    /**
     * Display a listing of the ModeloAviso.
     *
     * @param ModeloAvisoDataTable $modeloAvisoDataTable
     * @return Response
     */
    public function index(ModeloAvisoDataTable $modeloAvisoDataTable)
    {
        return $modeloAvisoDataTable->render('modelo_avisos.index');
    }

    /**
     * Show the form for creating a new ModeloAviso.
     *
     * @return Response
     */
    public function create()
    {
        $escolas = $this->empresaRepository->all();

        return view('modelo_avisos.create', compact('escolas'));
    }

    /**
     * Store a newly created ModeloAviso in storage.
     *
     * @param CreateModeloAvisoRequest $request
     *
     * @return Response
     */
    public function store(CreateModeloAvisoRequest $request)
    {
        $request->request->add(['user_id' => Auth::id()]);

        $input = $request->all();

        $modeloAviso = $this->modeloAvisoRepository->create($input);

        Flash::success('Modelo Aviso saved successfully.');

        return redirect(route('modeloAvisos.index'));
    }

    /**
     * Display the specified ModeloAviso.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $modeloAviso = $this->modeloAvisoRepository->findWithoutFail($id);

        if (empty($modeloAviso)) {
            Flash::error('Modelo Aviso not found');

            return redirect(route('modeloAvisos.index'));
        }

        return view('modelo_avisos.show')->with('modeloAviso', $modeloAviso);
    }

    /**
     * Show the form for editing the specified ModeloAviso.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $modeloAviso = $this->modeloAvisoRepository->findWithoutFail($id);
        $escolas = $this->empresaRepository->all();

        if (empty($modeloAviso)) {
            Flash::error('Modelo Aviso not found');

            return redirect(route('modeloAvisos.index'));
        }

        return view('modelo_avisos.edit')->with('modeloAviso', $modeloAviso)->with(compact('escolas'));
    }

    /**
     * Update the specified ModeloAviso in storage.
     *
     * @param  int              $id
     * @param UpdateModeloAvisoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateModeloAvisoRequest $request)
    {
        $modeloAviso = $this->modeloAvisoRepository->findWithoutFail($id);

        if (empty($modeloAviso)) {
            Flash::error('Modelo Aviso not found');

            return redirect(route('modeloAvisos.index'));
        }

        $modeloAviso = $this->modeloAvisoRepository->update($request->all(), $id);

        Flash::success('Modelo Aviso updated successfully.');

        return redirect(route('modeloAvisos.index'));
    }

    /**
     * Remove the specified ModeloAviso from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $modeloAviso = $this->modeloAvisoRepository->findWithoutFail($id);

        if (empty($modeloAviso)) {
            Flash::error('Modelo Aviso not found');

            return redirect(route('modeloAvisos.index'));
        }

        $this->modeloAvisoRepository->delete($id);

        Flash::success('Modelo Aviso deleted successfully.');

        return redirect(route('modeloAvisos.index'));
    }
}
