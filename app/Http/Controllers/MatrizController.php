<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMatrizRequest;
use App\Http\Requests\UpdateMatrizRequest;
use App\Models\Carrera;
use App\Models\Departamento;
use App\Models\Modelo;
use App\Models\Periodo;
use App\Models\TipoEvaluacion;
use App\Models\TipoMatriz;
use App\Repositories\MatrizRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class MatrizController extends AppBaseController
{
    /** @var  MatrizRepository */
    private $matrizRepository;

    public function __construct(MatrizRepository $matrizRepo)
    {
        $this->matrizRepository = $matrizRepo;
    }

    /**
     * Display a listing of the Matriz.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->matrizRepository->pushCriteria(new RequestCriteria($request));
        $matrizs = $this->matrizRepository->all();

        return view('matrizs.index')
            ->with('matrizs', $matrizs);
    }

    /**
     * Show the form for creating a new Matriz.
     *
     * @return Response
     */
    public function create()
    {
        $modelos = ['' => '--Seleccionar--'] + Modelo::where('estado',1)->pluck('nombre','id')->toArray();
        $periodos = ['' => '--Seleccionar--'] + Periodo::where('estado',1)->pluck('nombre','id')->toArray();
        $tipoEvaluacion = ['' => '--Seleccionar--'] + TipoEvaluacion::where('estado',1)->pluck('nombre','id')->toArray();
        $carreras = ['' => '--Seleccionar--'] + Carrera::where('estado',1)->pluck('nombre','id')->toArray();
        $tipoMatriz = ['' => '--Seleccionar--'] + TipoMatriz::where('estado',1)->pluck('nombre','id')->toArray();

        return view('matrizs.create',compact('modelos','periodos','tipoEvaluacion','carreras','tipoMatriz'));
    }

    /**
     * Store a newly created Matriz in storage.
     *
     * @param CreateMatrizRequest $request
     *
     * @return Response
     */
    public function store(CreateMatrizRequest $request)
    {
        $input = $request->all();
        $matriz = $this->matrizRepository->create($input);

        Flash::success('Matriz saved successfully.');

        return redirect(route('matrizs.index'));
    }

    /**
     * Display the specified Matriz.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $matriz = $this->matrizRepository->findWithoutFail($id);

        if (empty($matriz)) {
            Flash::error('Matriz not found');

            return redirect(route('matrizs.index'));
        }

        return view('matrizs.show')->with('matriz', $matriz);
    }

    /**
     * Show the form for editing the specified Matriz.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $matriz = $this->matrizRepository->findWithoutFail($id);

        if (empty($matriz)) {
            Flash::error('Matriz not found');

            return redirect(route('matrizs.index'));
        }

        $modelos = [0 => '--Seleccionar--'] + Modelo::where('estado',1)->pluck('nombre','id')->toArray();
        $periodos = [0 => '--Seleccionar--'] + Periodo::where('estado',1)->pluck('nombre','id')->toArray();
        $tipoEvaluacion = [0 => '--Seleccionar--'] + TipoEvaluacion::where('estado',1)->pluck('nombre','id')->toArray();
        $carreras = [0 => '--Seleccionar--'] + Carrera::where('estado',1)->pluck('nombre','id')->toArray();
        $departamentos = [0 => '--Seleccionar--'] + Departamento::where('estado',1)->pluck('nombre','id')->toArray();

        return view('matrizs.edit',compact('matriz','modelos','periodos','tipoEvaluacion','carreras','departamentos'));
    }

    /**
     * Update the specified Matriz in storage.
     *
     * @param  int              $id
     * @param UpdateMatrizRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMatrizRequest $request)
    {
        $matriz = $this->matrizRepository->findWithoutFail($id);

        if (empty($matriz)) {
            Flash::error('Matriz not found');

            return redirect(route('matrizs.index'));
        }

        $matriz = $this->matrizRepository->update($request->all(), $id);

        Flash::success('Matriz updated successfully.');

        return redirect(route('matrizs.index'));
    }

    /**
     * Remove the specified Matriz from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $matriz = $this->matrizRepository->findWithoutFail($id);

        if (empty($matriz)) {
            Flash::error('Matriz not found');

            return redirect(route('matrizs.index'));
        }

        $this->matrizRepository->delete($id);

        Flash::success('Matriz deleted successfully.');

        return redirect(route('matrizs.index'));
    }
}
