<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTipoEvaluacionRequest;
use App\Http\Requests\UpdateTipoEvaluacionRequest;
use App\Repositories\TipoEvaluacionRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use HelperCal;

class TipoEvaluacionController extends AppBaseController
{
    /** @var  TipoEvaluacionRepository */
    private $tipoEvaluacionRepository;

    public function __construct(TipoEvaluacionRepository $tipoEvaluacionRepo)
    {
        $this->tipoEvaluacionRepository = $tipoEvaluacionRepo;
    }

    /**
     * Display a listing of the TipoEvaluacion.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tipoEvaluacionRepository->pushCriteria(new RequestCriteria($request));
        $tipoEvaluacions = $this->tipoEvaluacionRepository->all();

        return view('tipo_evaluacions.index')
            ->with('tipoEvaluacions', $tipoEvaluacions);
    }

    /**
     * Show the form for creating a new TipoEvaluacion.
     *
     * @return Response
     */
    public function create()
    {
        $tipoEvaluacion=null;
        return view('tipo_evaluacions.create')->with('tipoEvaluacion',$tipoEvaluacion);
    }

    /**
     * Store a newly created TipoEvaluacion in storage.
     *
     * @param CreateTipoEvaluacionRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoEvaluacionRequest $request)
    {
        request()->validate([
            'nombre' => 'required|string|unique:tipo_evaluacion,nombre',
            'estado' => 'required'
        ]);
        $input = $request->all();
        HelperCal::strUp($input);
        $tipoEvaluacion = $this->tipoEvaluacionRepository->create($input);

        Flash::success('Tipo Evaluacion saved successfully.');

        return redirect(route('tipoEvaluacions.index'));
    }

    /**
     * Display the specified TipoEvaluacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoEvaluacion = $this->tipoEvaluacionRepository->findWithoutFail($id);

        if (empty($tipoEvaluacion)) {
            Flash::error('Tipo Evaluacion not found');

            return redirect(route('tipoEvaluacions.index'));
        }

        return view('tipo_evaluacions.show')->with('tipoEvaluacion', $tipoEvaluacion);
    }

    /**
     * Show the form for editing the specified TipoEvaluacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoEvaluacion = $this->tipoEvaluacionRepository->findWithoutFail($id);

        if (empty($tipoEvaluacion)) {
            Flash::error('Tipo Evaluacion not found');

            return redirect(route('tipoEvaluacions.index'));
        }

        return view('tipo_evaluacions.edit')->with('tipoEvaluacion', $tipoEvaluacion);
    }

    /**
     * Update the specified TipoEvaluacion in storage.
     *
     * @param  int              $id
     * @param UpdateTipoEvaluacionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoEvaluacionRequest $request)
    {
        request()->validate([
            'nombre' => 'required|string|unique:tipo_evaluacion,nombre,'.$id,
            'estado' => 'required'
        ]);
        $tipoEvaluacion = $this->tipoEvaluacionRepository->findWithoutFail($id);

        if (empty($tipoEvaluacion)) {
            Flash::error('Tipo Evaluacion not found');

            return redirect(route('tipoEvaluacions.index'));
        }
        $input = $request->all();
        HelperCal::strUp($input);
        $tipoEvaluacion = $this->tipoEvaluacionRepository->update($input, $id);

        Flash::success('Tipo Evaluacion updated successfully.');

        return redirect(route('tipoEvaluacions.index'));
    }

    /**
     * Remove the specified TipoEvaluacion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoEvaluacion = $this->tipoEvaluacionRepository->findWithoutFail($id);

        if (empty($tipoEvaluacion)) {
            Flash::error('Tipo Evaluacion not found');

            return redirect(route('tipoEvaluacions.index'));
        }

        $this->tipoEvaluacionRepository->delete($id);

        Flash::success('Tipo Evaluacion deleted successfully.');

        return redirect(route('tipoEvaluacions.index'));
    }
}
