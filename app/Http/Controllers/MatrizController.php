<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMatrizRequest;
use App\Http\Requests\UpdateMatrizRequest;
use App\Models\Carrera;
use App\Models\Departamento;
use App\Models\EstructuraCriterios;
use App\Models\EstructuraElementos;
use App\Models\EstructuraEvidencias;
use App\Models\EstructuraIndicadores;
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

        /*$criterios = EstructuraCriterios::where('modelo_id',$matriz->modelo_id)->get();
        $indicadores = EstructuraIndicadores::leftjoin('estructura_criterios','estructura_indicadores.estruc_crite_id','=','estructura_criterios.id')
            ->where('estructura_criterios.modelo_id',$matriz->modelo_id)
            ->get();
        $evidencias = EstructuraEvidencias::leftjoin('estructura_indicadores','estructura_evidencias.estruc_indic_id','=','estructura_indicadores.id')
            ->leftjoin('estructura_criterios','estructura_indicadores.estruc_crite_id','=','estructura_criterios.id')
            ->where('estructura_criterios.modelo_id',$matriz->modelo_id)
            ->get();*/
        $elementos = EstructuraElementos::leftjoin('estructura_evidencias','estructura_elementos.estruc_evide_id','=','estructura_evidencias.id')
            ->leftjoin('estructura_indicadores','estructura_evidencias.estruc_indic_id','=','estructura_indicadores.id')
            ->leftjoin('estructura_criterios','estructura_indicadores.estruc_crite_id','=','estructura_criterios.id')
            ->where('estructura_criterios.modelo_id',$matriz->modelo_id)
            ->select('estructura_elementos.estruc_evide_id','estructura_elementos.elemento_id','estructura_evidencias.estruc_indic_id','estructura_evidencias.evidencia_id','estructura_indicadores.estruc_crite_id','estructura_indicadores.indicador_id','estructura_criterios.criterio_id','estructura_criterios.padre_id')
            ->get();
        return view('matrizs.show',compact('matriz','elementos'));
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

        $modelos = ['' => '--Seleccionar--'] + Modelo::where('estado',1)->pluck('nombre','id')->toArray();
        $periodos = ['' => '--Seleccionar--'] + Periodo::where('estado',1)->pluck('nombre','id')->toArray();
        $tipoEvaluacion = ['' => '--Seleccionar--'] + TipoEvaluacion::where('estado',1)->pluck('nombre','id')->toArray();
        $carreras = ['' => '--Seleccionar--'] + Carrera::where('estado',1)->pluck('nombre','id')->toArray();
        $tipoMatriz = ['' => '--Seleccionar--'] + TipoMatriz::where('estado',1)->pluck('nombre','id')->toArray();

        return view('matrizs.edit',compact('matriz','modelos','periodos','tipoEvaluacion','carreras','tipoMatriz'));
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
