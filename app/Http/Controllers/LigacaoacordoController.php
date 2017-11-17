<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLigacaoacordoRequest;
use App\Http\Requests\UpdateLigacaoacordoRequest;
use App\Repositories\LigacaoacordoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class LigacaoacordoController extends AppBaseController
{
    /** @var  LigacaoacordoRepository */
    private $ligacaoacordoRepository;

    public function __construct(LigacaoacordoRepository $ligacaoacordoRepo)
    {
        $this->ligacaoacordoRepository = $ligacaoacordoRepo;
    }

    /**
     * Display a listing of the Ligacaoacordo.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->ligacaoacordoRepository->pushCriteria(new RequestCriteria($request));
        $ligacaoacordos = $this->ligacaoacordoRepository->all();

        return view('ligacaoacordos.index')
            ->with('ligacaoacordos', $ligacaoacordos);
    }

    /**
     * Show the form for creating a new Ligacaoacordo.
     *
     * @return Response
     */
    public function create()
    {
        return view('ligacaoacordos.create');
    }

    /**
     * Store a newly created Ligacaoacordo in storage.
     *
     * @param CreateLigacaoacordoRequest $request
     *
     * @return Response
     */
    public function store(CreateLigacaoacordoRequest $request)
    {
        $input = $request->all();

        $ligacaoacordo = $this->ligacaoacordoRepository->create($input);

        Flash::success('Ligacaoacordo saved successfully.');

        return redirect(route('ligacaoacordos.index'));
    }

    /**
     * Display the specified Ligacaoacordo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ligacaoacordo = $this->ligacaoacordoRepository->findWithoutFail($id);

        if (empty($ligacaoacordo)) {
            Flash::error('Ligacaoacordo not found');

            return redirect(route('ligacaoacordos.index'));
        }

        return view('ligacaoacordos.show')->with('ligacaoacordo', $ligacaoacordo);
    }

    /**
     * Show the form for editing the specified Ligacaoacordo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ligacaoacordo = $this->ligacaoacordoRepository->findWithoutFail($id);

        if (empty($ligacaoacordo)) {
            Flash::error('Ligacaoacordo not found');

            return redirect(route('ligacaoacordos.index'));
        }

        return view('ligacaoacordos.edit')->with('ligacaoacordo', $ligacaoacordo);
    }

    /**
     * Update the specified Ligacaoacordo in storage.
     *
     * @param  int              $id
     * @param UpdateLigacaoacordoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLigacaoacordoRequest $request)
    {
        $ligacaoacordo = $this->ligacaoacordoRepository->findWithoutFail($id);

        if (empty($ligacaoacordo)) {
            Flash::error('Ligacaoacordo not found');

            return redirect(route('ligacaoacordos.index'));
        }

        $ligacaoacordo = $this->ligacaoacordoRepository->update($request->all(), $id);

        Flash::success('Ligacaoacordo updated successfully.');

        return redirect(route('ligacaoacordos.index'));
    }

    /**
     * Remove the specified Ligacaoacordo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ligacaoacordo = $this->ligacaoacordoRepository->findWithoutFail($id);

        if (empty($ligacaoacordo)) {
            Flash::error('Ligacaoacordo not found');

            return redirect(route('ligacaoacordos.index'));
        }

        $this->ligacaoacordoRepository->delete($id);

        Flash::success('Ligacaoacordo deleted successfully.');

        return redirect(route('ligacaoacordos.index'));
    }
}
