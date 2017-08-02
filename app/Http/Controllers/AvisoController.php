<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAvisoRequest;
use App\Http\Requests\UpdateAvisoRequest;
use App\Repositories\AvisoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AvisoController extends AppBaseController
{
    /** @var  AvisoRepository */
    private $avisoRepository;

    public function __construct(AvisoRepository $avisoRepo)
    {
        $this->avisoRepository = $avisoRepo;
    }

    /**
     * Display a listing of the Aviso.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->avisoRepository->pushCriteria(new RequestCriteria($request));
        $avisos = $this->avisoRepository->all();

        return view('avisos.index')
            ->with('avisos', $avisos);
    }

    /**
     * Show the form for creating a new Aviso.
     *
     * @return Response
     */
    public function create()
    {
        return view('avisos.create');
    }

    /**
     * Store a newly created Aviso in storage.
     *
     * @param CreateAvisoRequest $request
     *
     * @return Response
     */
    public function store(CreateAvisoRequest $request)
    {
        $input = $request->all();

        $aviso = $this->avisoRepository->create($input);

        Flash::success('Aviso saved successfully.');

        return redirect(route('avisos.index'));
    }

    /**
     * Display the specified Aviso.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $aviso = $this->avisoRepository->findWithoutFail($id);

        if (empty($aviso)) {
            Flash::error('Aviso not found');

            return redirect(route('avisos.index'));
        }

        return view('avisos.show')->with('aviso', $aviso);
    }

    /**
     * Show the form for editing the specified Aviso.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $aviso = $this->avisoRepository->findWithoutFail($id);

        if (empty($aviso)) {
            Flash::error('Aviso not found');

            return redirect(route('avisos.index'));
        }

        return view('avisos.edit')->with('aviso', $aviso);
    }

    /**
     * Update the specified Aviso in storage.
     *
     * @param  int              $id
     * @param UpdateAvisoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAvisoRequest $request)
    {
        $aviso = $this->avisoRepository->findWithoutFail($id);

        if (empty($aviso)) {
            Flash::error('Aviso not found');

            return redirect(route('avisos.index'));
        }

        $aviso = $this->avisoRepository->update($request->all(), $id);

        Flash::success('Aviso updated successfully.');

        return redirect(route('avisos.index'));
    }

    /**
     * Remove the specified Aviso from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $aviso = $this->avisoRepository->findWithoutFail($id);

        if (empty($aviso)) {
            Flash::error('Aviso not found');

            return redirect(route('avisos.index'));
        }

        $this->avisoRepository->delete($id);

        Flash::success('Aviso deleted successfully.');

        return redirect(route('avisos.index'));
    }
}
