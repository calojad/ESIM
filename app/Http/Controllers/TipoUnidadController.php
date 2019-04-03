<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTipoUnidadRequest;
use App\Http\Requests\UpdateTipoUnidadRequest;
use App\Repositories\TipoUnidadRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TipoUnidadController extends AppBaseController
{
    /** @var  TipoUnidadRepository */
    private $tipoUnidadRepository;

    public function __construct(TipoUnidadRepository $tipoUnidadRepo)
    {
        $this->tipoUnidadRepository = $tipoUnidadRepo;
    }

    /**
     * Display a listing of the TipoUnidad.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tipoUnidadRepository->pushCriteria(new RequestCriteria($request));
        $tipoUnidads = $this->tipoUnidadRepository->all();

        return view('tipo_unidads.index')
            ->with('tipoUnidads', $tipoUnidads);
    }

    /**
     * Show the form for creating a new TipoUnidad.
     *
     * @return Response
     */
    public function create()
    {
        $tipoUnidad=null;
        return view('tipo_unidads.create')->with('tipoUnidad',$tipoUnidad);
    }

    /**
     * Store a newly created TipoUnidad in storage.
     *
     * @param CreateTipoUnidadRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoUnidadRequest $request)
    {
        request()->validate([
            'nombre' => 'required|string|unique:tipo_unidad,nombre',
            'estado' => 'required'
        ]);
        $input = $request->all();

        $tipoUnidad = $this->tipoUnidadRepository->create($input);

        Flash::success('Tipo Unidad saved successfully.');

        return redirect(route('tipoUnidads.index'));
    }

    /**
     * Display the specified TipoUnidad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoUnidad = $this->tipoUnidadRepository->findWithoutFail($id);

        if (empty($tipoUnidad)) {
            Flash::error('Tipo Unidad not found');

            return redirect(route('tipoUnidads.index'));
        }

        return view('tipo_unidads.show')->with('tipoUnidad', $tipoUnidad);
    }

    /**
     * Show the form for editing the specified TipoUnidad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoUnidad = $this->tipoUnidadRepository->findWithoutFail($id);

        if (empty($tipoUnidad)) {
            Flash::error('Tipo Unidad not found');

            return redirect(route('tipoUnidads.index'));
        }

        return view('tipo_unidads.edit')->with('tipoUnidad', $tipoUnidad);
    }

    /**
     * Update the specified TipoUnidad in storage.
     *
     * @param  int              $id
     * @param UpdateTipoUnidadRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoUnidadRequest $request)
    {
        request()->validate([
            'nombre' => 'required|string|unique:tipo_unidad,nombre,'.$id,
            'estado' => 'required'
        ]);
        $tipoUnidad = $this->tipoUnidadRepository->findWithoutFail($id);

        if (empty($tipoUnidad)) {
            Flash::error('Tipo Unidad not found');

            return redirect(route('tipoUnidads.index'));
        }

        $tipoUnidad = $this->tipoUnidadRepository->update($request->all(), $id);

        Flash::success('Tipo Unidad updated successfully.');

        return redirect(route('tipoUnidads.index'));
    }

    /**
     * Remove the specified TipoUnidad from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoUnidad = $this->tipoUnidadRepository->findWithoutFail($id);

        if (empty($tipoUnidad)) {
            Flash::error('Tipo Unidad not found');

            return redirect(route('tipoUnidads.index'));
        }

        $this->tipoUnidadRepository->delete($id);

        Flash::success('Tipo Unidad deleted successfully.');

        return redirect(route('tipoUnidads.index'));
    }
}
