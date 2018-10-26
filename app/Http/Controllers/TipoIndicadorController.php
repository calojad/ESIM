<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTipoIndicadorRequest;
use App\Http\Requests\UpdateTipoIndicadorRequest;
use App\Repositories\TipoIndicadorRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TipoIndicadorController extends AppBaseController
{
    /** @var  TipoIndicadorRepository */
    private $tipoIndicadorRepository;

    public function __construct(TipoIndicadorRepository $tipoIndicadorRepo)
    {
        $this->tipoIndicadorRepository = $tipoIndicadorRepo;
    }

    /**
     * Display a listing of the TipoIndicador.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tipoIndicadorRepository->pushCriteria(new RequestCriteria($request));
        $tipoIndicadors = $this->tipoIndicadorRepository->all();

        return view('tipo_indicadors.index')
            ->with('tipoIndicadors', $tipoIndicadors);
    }

    /**
     * Show the form for creating a new TipoIndicador.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipo_indicadors.create');
    }

    /**
     * Store a newly created TipoIndicador in storage.
     *
     * @param CreateTipoIndicadorRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoIndicadorRequest $request)
    {
        $input = $request->all();

        $tipoIndicador = $this->tipoIndicadorRepository->create($input);

        Flash::success('Tipo Indicador saved successfully.');

        return redirect(route('tipoIndicadors.index'));
    }

    /**
     * Display the specified TipoIndicador.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoIndicador = $this->tipoIndicadorRepository->findWithoutFail($id);

        if (empty($tipoIndicador)) {
            Flash::error('Tipo Indicador not found');

            return redirect(route('tipoIndicadors.index'));
        }

        return view('tipo_indicadors.show')->with('tipoIndicador', $tipoIndicador);
    }

    /**
     * Show the form for editing the specified TipoIndicador.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoIndicador = $this->tipoIndicadorRepository->findWithoutFail($id);

        if (empty($tipoIndicador)) {
            Flash::error('Tipo Indicador not found');

            return redirect(route('tipoIndicadors.index'));
        }

        return view('tipo_indicadors.edit')->with('tipoIndicador', $tipoIndicador);
    }

    /**
     * Update the specified TipoIndicador in storage.
     *
     * @param  int              $id
     * @param UpdateTipoIndicadorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoIndicadorRequest $request)
    {
        $tipoIndicador = $this->tipoIndicadorRepository->findWithoutFail($id);

        if (empty($tipoIndicador)) {
            Flash::error('Tipo Indicador not found');

            return redirect(route('tipoIndicadors.index'));
        }

        $tipoIndicador = $this->tipoIndicadorRepository->update($request->all(), $id);

        Flash::success('Tipo Indicador updated successfully.');

        return redirect(route('tipoIndicadors.index'));
    }

    /**
     * Remove the specified TipoIndicador from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoIndicador = $this->tipoIndicadorRepository->findWithoutFail($id);

        if (empty($tipoIndicador)) {
            Flash::error('Tipo Indicador not found');

            return redirect(route('tipoIndicadors.index'));
        }

        $this->tipoIndicadorRepository->delete($id);

        Flash::success('Tipo Indicador deleted successfully.');

        return redirect(route('tipoIndicadors.index'));
    }
}
