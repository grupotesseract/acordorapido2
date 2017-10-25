<?php

namespace App\Http\Controllers;

use App\DataTables\PermUserEmpresaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePermUserEmpresaRequest;
use App\Http\Requests\UpdatePermUserEmpresaRequest;
use App\Repositories\PermUserEmpresaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PermUserEmpresaController extends AppBaseController
{
    /** @var  PermUserEmpresaRepository */
    private $permUserEmpresaRepository;

    public function __construct(PermUserEmpresaRepository $permUserEmpresaRepo)
    {
        $this->permUserEmpresaRepository = $permUserEmpresaRepo;
    }

    /**
     * Display a listing of the PermUserEmpresa.
     *
     * @param PermUserEmpresaDataTable $permUserEmpresaDataTable
     * @return Response
     */
    public function index(PermUserEmpresaDataTable $permUserEmpresaDataTable)
    {
        return $permUserEmpresaDataTable->render('perm_user_empresas.index');
    }

    /**
     * Show the form for creating a new PermUserEmpresa.
     *
     * @return Response
     */
    public function create()
    {
        return view('perm_user_empresas.create');
    }

    /**
     * Store a newly created PermUserEmpresa in storage.
     *
     * @param CreatePermUserEmpresaRequest $request
     *
     * @return Response
     */
    public function store(CreatePermUserEmpresaRequest $request)
    {
        $input = $request->all();

        $permUserEmpresa = $this->permUserEmpresaRepository->create($input);

        Flash::success('Permissao por ano criada com sucesso!');

        return redirect()->back();
    }

    /**
     * Display the specified PermUserEmpresa.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $permUserEmpresa = $this->permUserEmpresaRepository->findWithoutFail($id);

        if (empty($permUserEmpresa)) {
            Flash::error('Perm User Empresa not found');

            return redirect(route('permUserEmpresas.index'));
        }

        return view('perm_user_empresas.show')->with('permUserEmpresa', $permUserEmpresa);
    }

    /**
     * Show the form for editing the specified PermUserEmpresa.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $permUserEmpresa = $this->permUserEmpresaRepository->findWithoutFail($id);

        if (empty($permUserEmpresa)) {
            Flash::error('Perm User Empresa not found');

            return redirect(route('permUserEmpresas.index'));
        }

        return view('perm_user_empresas.edit')->with('permUserEmpresa', $permUserEmpresa);
    }

    /**
     * Update the specified PermUserEmpresa in storage.
     *
     * @param  int              $id
     * @param UpdatePermUserEmpresaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePermUserEmpresaRequest $request)
    {
        $permUserEmpresa = $this->permUserEmpresaRepository->findWithoutFail($id);

        if (empty($permUserEmpresa)) {
            Flash::error('Perm User Empresa not found');

            return redirect(route('permUserEmpresas.index'));
        }

        $permUserEmpresa = $this->permUserEmpresaRepository->update($request->all(), $id);

        Flash::success('Perm User Empresa updated successfully.');

        return redirect(route('permUserEmpresas.index'));
    }

    /**
     * Remove the specified PermUserEmpresa from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $permUserEmpresa = $this->permUserEmpresaRepository->findWithoutFail($id);

        if (empty($permUserEmpresa)) {
            Flash::error('Perm User Empresa not found');

            return redirect(route('permUserEmpresas.index'));
        }

        $this->permUserEmpresaRepository->delete($id);

        Flash::success('Perm User Empresa deleted successfully.');

        return redirect(route('permUserEmpresas.index'));
    }
}
