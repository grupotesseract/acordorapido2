<?php

/*
 * Desenvolvedores:
 * Fernando Fernandes
 * Evandro Carreira
 * Renato Gomes
 *
 */

namespace App\Http\Controllers;

use Flash;
use Response;
use App\DataTables\ContatoDataTable;
use App\Repositories\ContatoRepository;
use App\Http\Requests\CreateContatoRequest;
use App\Http\Requests\UpdateContatoRequest;

class ContatoController extends AppBaseController
{
    /** @var ContatoRepository */
    private $contatoRepository;

    public function __construct(ContatoRepository $contatoRepo)
    {
        $this->contatoRepository = $contatoRepo;
    }

    /**
     * Display a listing of the Contato.
     *
     * @param ContatoDataTable $contatoDataTable
     * @return Response
     */
    public function index(ContatoDataTable $contatoDataTable)
    {
        return $contatoDataTable->render('contatos.index');
    }

    /**
     * Show the form for creating a new Contato.
     *
     * @return Response
     */
    public function create()
    {
        return view('contatos.create');
    }

    /**
     * Store a newly created Contato in storage.
     *
     * @param CreateContatoRequest $request
     *
     * @return Response
     */
    public function store(CreateContatoRequest $request)
    {
        $input = $request->all();

        $contato = $this->contatoRepository->create($input);

        if ($contato) {
            return ['success' => true];
        }
    }

    /**
     * Display the specified Contato.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contato = $this->contatoRepository->findWithoutFail($id);

        if (empty($contato)) {
            Flash::error('Contato not found');

            return redirect(route('contatos.index'));
        }

        return view('contatos.show')->with('contato', $contato);
    }

    /**
     * Show the form for editing the specified Contato.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contato = $this->contatoRepository->findWithoutFail($id);

        if (empty($contato)) {
            Flash::error('Contato not found');

            return redirect(route('contatos.index'));
        }

        return view('contatos.edit')->with('contato', $contato);
    }

    /**
     * Update the specified Contato in storage.
     *
     * @param  int              $id
     * @param UpdateContatoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContatoRequest $request)
    {
        $contato = $this->contatoRepository->findWithoutFail($id);

        if (empty($contato)) {
            Flash::error('Contato not found');

            return redirect(route('contatos.index'));
        }

        $contato = $this->contatoRepository->update($request->all(), $id);

        Flash::success('Contato updated successfully.');

        return redirect(route('contatos.index'));
    }

    /**
     * Remove the specified Contato from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contato = $this->contatoRepository->findWithoutFail($id);

        if (empty($contato)) {
            Flash::error('Contato not found');

            return redirect(route('contatos.index'));
        }

        $this->contatoRepository->delete($id);

        Flash::success('Contato deleted successfully.');

        return redirect(route('contatos.index'));
    }
}
