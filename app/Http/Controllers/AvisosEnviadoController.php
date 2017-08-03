<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\DataTables\AvisosEnviadoDataTable;
use App\Repositories\AvisosEnviadoRepository;
use App\Http\Requests\CreateAvisosEnviadoRequest;
use App\Http\Requests\UpdateAvisosEnviadoRequest;

class AvisosEnviadoController extends AppBaseController
{
    /** @var AvisosEnviadoRepository */
    private $avisosEnviadoRepository;

    public function __construct(AvisosEnviadoRepository $avisosEnviadoRepo)
    {
        $this->avisosEnviadoRepository = $avisosEnviadoRepo;
    }

    /**
     * Display a listing of the AvisosEnviado.
     *
     * @param AvisosEnviadoDataTable $avisosEnviadoDataTable
     * @return Response
     */
    public function index(AvisosEnviadoDataTable $avisosEnviadoDataTable)
    {
        return $avisosEnviadoDataTable->render('avisos_enviados.index');
    }

    /**
     * Show the form for creating a new AvisosEnviado.
     *
     * @return Response
     */
    public function create()
    {
        return view('avisos_enviados.create');
    }

    /**
     * Store a newly created AvisosEnviado in storage.
     *
     * @param CreateAvisosEnviadoRequest $request
     *
     * @return Response
     */
    public function store(CreateAvisosEnviadoRequest $request)
    {
        $input = $request->all();

        $avisosEnviado = $this->avisosEnviadoRepository->create($input);

        Flash::success('Avisos Enviado saved successfully.');

        return redirect(route('avisosEnviados.index'));
    }

    /**
     * Display the specified AvisosEnviado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $avisosEnviado = $this->avisosEnviadoRepository->findWithoutFail($id);

        if (empty($avisosEnviado)) {
            Flash::error('Avisos Enviado not found');

            return redirect(route('avisosEnviados.index'));
        }

        return view('avisos_enviados.show')->with('avisosEnviado', $avisosEnviado);
    }

    /**
     * Show the form for editing the specified AvisosEnviado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $avisosEnviado = $this->avisosEnviadoRepository->findWithoutFail($id);

        if (empty($avisosEnviado)) {
            Flash::error('Avisos Enviado not found');

            return redirect(route('avisosEnviados.index'));
        }

        return view('avisos_enviados.edit')->with('avisosEnviado', $avisosEnviado);
    }

    /**
     * Update the specified AvisosEnviado in storage.
     *
     * @param  int              $id
     * @param UpdateAvisosEnviadoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAvisosEnviadoRequest $request)
    {
        $avisosEnviado = $this->avisosEnviadoRepository->findWithoutFail($id);

        if (empty($avisosEnviado)) {
            Flash::error('Avisos Enviado not found');

            return redirect(route('avisosEnviados.index'));
        }

        $avisosEnviado = $this->avisosEnviadoRepository->update($request->all(), $id);

        Flash::success('Avisos Enviado updated successfully.');

        return redirect(route('avisosEnviados.index'));
    }

    /**
     * Remove the specified AvisosEnviado from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $avisosEnviado = $this->avisosEnviadoRepository->findWithoutFail($id);

        if (empty($avisosEnviado)) {
            Flash::error('Avisos Enviado not found');

            return redirect(route('avisosEnviados.index'));
        }

        $this->avisosEnviadoRepository->delete($id);

        Flash::success('Avisos Enviado deleted successfully.');

        return redirect(route('avisosEnviados.index'));
    }
}
