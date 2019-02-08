<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEvidenciaRequest;
use App\Http\Requests\UpdateEvidenciaRequest;
use App\Models\Elemento;
use App\Models\EstructuraCriterios;
use App\Models\EstructuraElementos;
use App\Models\Evidencia;
use App\Repositories\EvidenciaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EvidenciaController extends AppBaseController
{
    /** @var  EvidenciaRepository */
    private $evidenciaRepository;

    public function __construct(EvidenciaRepository $evidenciaRepo)
    {
        $this->evidenciaRepository = $evidenciaRepo;
    }

    /**
     * Display a listing of the Evidencia.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->evidenciaRepository->pushCriteria(new RequestCriteria($request));
        $evidencias = $this->evidenciaRepository->all();

        return view('evidencias.index')
            ->with('evidencias', $evidencias);
    }

    /**
     * Show the form for creating a new Evidencia.
     *
     * @return Response
     */
    public function create()
    {
        return view('evidencias.create');
    }

    /**
     * Store a newly created Evidencia in storage.
     *
     * @param CreateEvidenciaRequest $request
     *
     * @return Response
     */
    public function store(CreateEvidenciaRequest $request)
    {
        $input = $request->all();
        $evidencia = $this->evidenciaRepository->create($input);

        Flash::success('Evidencia saved successfully.');

        return redirect(route('evidencias.index'));
    }

    /**
     * Display the specified Evidencia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $evidencia = $this->evidenciaRepository->findWithoutFail($id);

        if (empty($evidencia)) {
            Flash::error('Evidencia not found');

            return redirect(route('evidencias.index'));
        }

        $estruc_modelo = EstructuraCriterios::find($evidencia->estructuraEvidencias[0]->estructuraIndicadore->estructuraCriterio->modelo_id);

        $elementos = Elemento::where('estado',1)->get();

        $eel_array = EstructuraElementos::leftjoin('estructura_evidencias','estructura_elementos.estruc_evide_id','=','estructura_evidencias.id')
            ->leftjoin('estructura_indicadores','estructura_evidencias.estruc_indic_id','=','estructura_indicadores.id')
            ->leftjoin('estructura_criterios','estructura_indicadores.estruc_crite_id','=','estructura_criterios.id')
            ->where('estructura_criterios.modelo_id',$estruc_modelo)
            ->pluck('estructura_elementos.elemento_id')
            ->toArray();

        $estrucElementos = EstructuraElementos::where('estruc_evide_id',$evidencia->estructuraEvidencias[0]->id)->get();

        return view('evidencias.show',compact('evidencia','estruc_modelo','elementos','estrucElementos','eel_array'));
    }

    /**
     * Show the form for editing the specified Evidencia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $evidencia = $this->evidenciaRepository->findWithoutFail($id);

        if (empty($evidencia)) {
            Flash::error('Evidencia not found');

            return redirect(route('evidencias.index'));
        }

        return view('evidencias.edit')->with('evidencia', $evidencia);
    }

    /**
     * Update the specified Evidencia in storage.
     *
     * @param  int              $id
     * @param UpdateEvidenciaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEvidenciaRequest $request)
    {
        $evidencia = $this->evidenciaRepository->findWithoutFail($id);

        if (empty($evidencia)) {
            Flash::error('Evidencia not found');

            return redirect(route('evidencias.index'));
        }

        $evidencia = $this->evidenciaRepository->update($request->all(), $id);

        Flash::success('Evidencia updated successfully.');

        return redirect(route('evidencias.index'));
    }

    /**
     * Remove the specified Evidencia from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $evidencia = $this->evidenciaRepository->findWithoutFail($id);

        if (empty($evidencia)) {
            Flash::error('Evidencia not found');

            return redirect(route('evidencias.index'));
        }

        $this->evidenciaRepository->delete($id);

        Flash::success('Evidencia deleted successfully.');

        return redirect(route('evidencias.index'));
    }

}
