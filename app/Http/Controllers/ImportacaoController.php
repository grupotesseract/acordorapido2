<?php

namespace App\Http\Controllers;

use App\DataTables\ImportacaoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateImportacaoRequest;
use App\Http\Requests\UpdateImportacaoRequest;
use App\Repositories\ImportacaoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ImportacaoController extends AppBaseController
{
    /** @var  ImportacaoRepository */
    private $importacaoRepository;

    public function __construct(ImportacaoRepository $importacaoRepo)
    {
        $this->importacaoRepository = $importacaoRepo;
    }

    /**
     * Display a listing of the Importacao.
     *
     * @param ImportacaoDataTable $importacaoDataTable
     * @return Response
     */
    public function index(ImportacaoDataTable $importacaoDataTable)
    {
        return $importacaoDataTable->render('importacaos.index');
    }

    /**
     * Show the form for creating a new Importacao.
     *
     * @return Response
     */
    public function create()
    {
        return view('importacaos.create');
    }

    /**
     * Store a newly created Importacao in storage.
     *
     * @param CreateImportacaoRequest $request
     *
     * @return Response
     */
    public function store(CreateImportacaoRequest $request)
    {
        $input = $request->all();

        $importacao = $this->importacaoRepository->create($input);

        Flash::success('Importacao saved successfully.');

        return redirect(route('importacaos.index'));
    }

    /**
     * Display the specified Importacao.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $importacao = $this->importacaoRepository->findWithoutFail($id);

        if (empty($importacao)) {
            Flash::error('Importacao not found');

            return redirect(route('importacaos.index'));
        }

        return view('importacaos.show')->with('importacao', $importacao);
    }

    /**
     * Show the form for editing the specified Importacao.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $importacao = $this->importacaoRepository->findWithoutFail($id);

        if (empty($importacao)) {
            Flash::error('Importacao not found');

            return redirect(route('importacaos.index'));
        }

        return view('importacaos.edit')->with('importacao', $importacao);
    }

    /**
     * Update the specified Importacao in storage.
     *
     * @param  int              $id
     * @param UpdateImportacaoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateImportacaoRequest $request)
    {
        $importacao = $this->importacaoRepository->findWithoutFail($id);

        if (empty($importacao)) {
            Flash::error('Importacao not found');

            return redirect(route('importacaos.index'));
        }

        $importacao = $this->importacaoRepository->update($request->all(), $id);

        Flash::success('Importacao updated successfully.');

        return redirect(route('importacaos.index'));
    }

    /**
     * Remove the specified Importacao from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $importacao = $this->importacaoRepository->findWithoutFail($id);

        if (empty($importacao)) {
            Flash::error('Importacao not found');

            return redirect(route('importacaos.index'));
        }

        $this->importacaoRepository->delete($id);

        Flash::success('Importacao deleted successfully.');

        return redirect(route('importacaos.index'));
    }
}
