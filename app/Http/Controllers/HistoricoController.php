<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHistoricoRequest;
use App\Http\Requests\UpdateHistoricoRequest;
use App\Repositories\HistoricoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class HistoricoController extends AppBaseController
{
    /** @var  HistoricoRepository */
    private $historicoRepository;

    public function __construct(HistoricoRepository $historicoRepo)
    {
        $this->historicoRepository = $historicoRepo;
    }

    /**
     * Display a listing of the Historico.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->historicoRepository->pushCriteria(new RequestCriteria($request));
        $historicos = $this->historicoRepository->with('user')->all();

        return view('historicos.index')
            ->with('historicos', $historicos);
    }

    /**
     * Show the form for creating a new Historico.
     *
     * @return Response
     */
    public function create()
    {
        return view('historicos.create');
    }

    /**
     * Store a newly created Historico in storage.
     *
     * @param CreateHistoricoRequest $request
     *
     * @return Response
     */
    public function store(CreateHistoricoRequest $request)
    {
        $input = $request->all();

        $historico = $this->historicoRepository->create($input);

        Flash::success('Historico saved successfully.');

        return redirect(route('historicos.index'));
    }

    /**
     * Display the specified Historico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $historico = $this->historicoRepository->findWithoutFail($id);

        if (empty($historico)) {
            Flash::error('Historico not found');

            return redirect(route('historicos.index'));
        }

        return view('historicos.show')->with('historico', $historico);
    }

    /**
     * Show the form for editing the specified Historico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $historico = $this->historicoRepository->findWithoutFail($id);

        if (empty($historico)) {
            Flash::error('Historico not found');

            return redirect(route('historicos.index'));
        }

        return view('historicos.edit')->with('historico', $historico);
    }

    /**
     * Update the specified Historico in storage.
     *
     * @param  int              $id
     * @param UpdateHistoricoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHistoricoRequest $request)
    {
        $historico = $this->historicoRepository->findWithoutFail($id);

        if (empty($historico)) {
            Flash::error('Historico not found');

            return redirect(route('historicos.index'));
        }

        $historico = $this->historicoRepository->update($request->all(), $id);

        Flash::success('Historico updated successfully.');

        return redirect(route('historicos.index'));
    }

    /**
     * Remove the specified Historico from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $historico = $this->historicoRepository->findWithoutFail($id);

        if (empty($historico)) {
            Flash::error('Historico not found');

            return redirect(route('historicos.index'));
        }

        $this->historicoRepository->delete($id);

        Flash::success('Historico deleted successfully.');

        return redirect(route('historicos.index'));
    }
}
