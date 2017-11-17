<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use Illuminate\Http\Request;
use App\Repositories\ParcelamentoRepository;
use App\Http\Requests\CreateParcelamentoRequest;
use App\Http\Requests\UpdateParcelamentoRequest;
use Prettus\Repository\Criteria\RequestCriteria;

class ParcelamentoController extends AppBaseController
{
    /** @var ParcelamentoRepository */
    private $parcelamentoRepository;

    public function __construct(ParcelamentoRepository $parcelamentoRepo)
    {
        $this->parcelamentoRepository = $parcelamentoRepo;
    }

    /**
     * Display a listing of the Parcelamento.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->parcelamentoRepository->pushCriteria(new RequestCriteria($request));
        $parcelamentos = $this->parcelamentoRepository->all();

        return view('parcelamentos.index')
            ->with('parcelamentos', $parcelamentos);
    }

    /**
     * Show the form for creating a new Parcelamento.
     *
     * @return Response
     */
    public function create()
    {
        return view('parcelamentos.create');
    }

    /**
     * Store a newly created Parcelamento in storage.
     *
     * @param CreateParcelamentoRequest $request
     *
     * @return Response
     */
    public function store(CreateParcelamentoRequest $request)
    {
        $input = $request->all();

        $parcelamento = $this->parcelamentoRepository->create($input);

        Flash::success('Parcelamento saved successfully.');

        return redirect(route('parcelamentos.index'));
    }

    /**
     * Display the specified Parcelamento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $parcelamento = $this->parcelamentoRepository->findWithoutFail($id);

        if (empty($parcelamento)) {
            Flash::error('Parcelamento not found');

            return redirect(route('parcelamentos.index'));
        }

        return view('parcelamentos.show')->with('parcelamento', $parcelamento);
    }

    /**
     * Show the form for editing the specified Parcelamento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $parcelamento = $this->parcelamentoRepository->findWithoutFail($id);

        if (empty($parcelamento)) {
            Flash::error('Parcelamento not found');

            return redirect(route('parcelamentos.index'));
        }

        return view('parcelamentos.edit')->with('parcelamento', $parcelamento);
    }

    /**
     * Update the specified Parcelamento in storage.
     *
     * @param  int              $id
     * @param UpdateParcelamentoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateParcelamentoRequest $request)
    {
        $parcelamento = $this->parcelamentoRepository->findWithoutFail($id);

        if (empty($parcelamento)) {
            Flash::error('Parcelamento not found');

            return redirect(route('parcelamentos.index'));
        }

        $parcelamento = $this->parcelamentoRepository->update($request->all(), $id);

        Flash::success('Parcelamento updated successfully.');

        return redirect(route('parcelamentos.index'));
    }

    /**
     * Remove the specified Parcelamento from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $parcelamento = $this->parcelamentoRepository->findWithoutFail($id);

        if (empty($parcelamento)) {
            Flash::error('Parcelamento not found');

            return redirect(route('parcelamentos.index'));
        }

        $this->parcelamentoRepository->delete($id);

        Flash::success('Parcelamento deleted successfully.');

        return redirect(route('parcelamentos.index'));
    }
}
