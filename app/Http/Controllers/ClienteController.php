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
use App\DataTables\ClienteDataTable;
use App\Repositories\ClienteRepository;
use App\Http\Requests\CreateClienteRequest;
use App\Http\Requests\UpdateClienteRequest;

class ClienteController extends AppBaseController
{
    /** @var ClienteRepository */
    private $clienteRepository;

    public function __construct(ClienteRepository $clienteRepo)
    {
        $this->clienteRepository = $clienteRepo;
    }

    /**
     * Display a listing of the Cliente.
     *
     * @param ClienteDataTable $clienteDataTable
     * @return Response
     */
    public function index(ClienteDataTable $clienteDataTable)
    {
        return $clienteDataTable->render('clientes.index');
    }

    /**
     * Show the form for creating a new Cliente.
     *
     * @return Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created Cliente in storage.
     *
     * @param CreateClienteRequest $request
     *
     * @return Response
     */
    public function store(CreateClienteRequest $request)
    {
        $negativado = isset($request->negativado) ? true : false;
        $request->request->add(['negativado' => $negativado]);
        $request->request->add(['user_id' => Auth::id()]);

        $input = $request->all();

        $cliente = $this->clienteRepository->create($input);

        Flash::success('Cliente salvo com sucesso.');

        return redirect(route('alunos.index'));
    }

    /**
     * Display the specified Cliente.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cliente = $this->clienteRepository->findWithoutFail($id);

        if (empty($cliente)) {
            Flash::error('Cliente não encontrado');

            return redirect(route('alunos.index'));
        }

        $cliente->titulos;

        if ($cliente->celular) {
            $cliente->contato = $cliente->celular;
        } elseif ($cliente->telefone) {
            $cliente->contato = $cliente->telefone;
        } elseif ($cliente->celular2) {
            $cliente->contato = $cliente->celular2;
        } elseif ($cliente->telefone2) {
            $cliente->contato = $cliente->telefone2;
        } else {
            $cliente->contato = 'Não possui telefone para contato';
        }

        return view('clientes.show')->with('cliente', $cliente);
    }

    /**
     * Show the form for editing the specified Cliente.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cliente = $this->clienteRepository->findWithoutFail($id);

        if (empty($cliente)) {
            Flash::error('Cliente não encontrado');

            return redirect(route('alunos.index'));
        }

        return view('clientes.edit')->with('cliente', $cliente);
    }

    /**
     * Update the specified Cliente in storage.
     *
     * @param  int              $id
     * @param UpdateClienteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClienteRequest $request)
    {
        $cliente = $this->clienteRepository->findWithoutFail($id);

        if (empty($cliente)) {
            Flash::error('Cliente não encontrado');

            return redirect(route('alunos.index'));
        }

        $negativado = isset($request->negativado) ? true : false;
        $request->request->add(['negativado' => $negativado]);
        $cliente = $this->clienteRepository->update($request->all(), $id);

        Flash::success('Cliente atualizado com sucesso.');

        return redirect(route('alunos.index'));
    }

    /**
     * Remove the specified Cliente from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cliente = $this->clienteRepository->findWithoutFail($id);

        if (empty($cliente)) {
            Flash::error('Cliente não encontrado');

            return redirect(route('alunos.index'));
        }

        $this->clienteRepository->delete($id);

        Flash::success('Cliente excluído com sucesso.');

        return redirect(route('alunos.index'));
    }
}
