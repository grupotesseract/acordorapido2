<?php

namespace App\Http\Controllers;

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
        $input = $request->all();

        $cliente = $this->clienteRepository->create($input);

        Flash::success('Cliente salvo com sucesso.');

        return redirect(route('clientes.index'));
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

            return redirect(route('clientes.index'));
        }

        if($cliente->celular) {
            $cliente->contato = $cliente->celular;
        } else if ($cliente->telefone) {
            $cliente->contato = $cliente->telefone;
        } else if ($cliente->celular2) {
            $cliente->contato = $cliente->celular2;
        } else if ($cliente->telefone2) {
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

            return redirect(route('clientes.index'));
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

            return redirect(route('clientes.index'));
        }

        $cliente = $this->clienteRepository->update($request->all(), $id);

        Flash::success('Cliente atualizado com sucesso.');

        return redirect(route('clientes.index'));
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

            return redirect(route('clientes.index'));
        }

        $this->clienteRepository->delete($id);

        Flash::success('Cliente excluído com sucesso.');

        return redirect(route('clientes.index'));
    }
}
