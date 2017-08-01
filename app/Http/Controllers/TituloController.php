<?php

namespace App\Http\Controllers;

use App\DataTables\TituloDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTituloRequest;
use App\Http\Requests\UpdateTituloRequest;
use App\Repositories\TituloRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class TituloController extends AppBaseController
{
    /** @var  TituloRepository */
    private $tituloRepository;

    public function __construct(TituloRepository $tituloRepo)
    {
        $this->tituloRepository = $tituloRepo;
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
}
