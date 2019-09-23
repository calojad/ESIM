<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIndicadorRequest;
use App\Http\Requests\UpdateIndicadorRequest;
use App\Models\EstructuraCriterios;
use App\Models\EstructuraEvidencias;
use App\Models\Evidencia;
use App\Models\Formulas;
use App\Models\GrupoValor;
use App\Models\Indicador;
use App\Models\TipoIndicador;
use App\Repositories\IndicadorRepository;
use App\Rules\MayoraCero;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class IndicadorController extends AppBaseController
{
    /** @var  IndicadorRepository */
    private $indicadorRepository;

    public function __construct(IndicadorRepository $indicadorRepo)
    {
        $this->indicadorRepository = $indicadorRepo;
    }

    /**
     * Display a listing of the Indicador.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->indicadorRepository->pushCriteria(new RequestCriteria($request));
        $indicadors = $this->indicadorRepository->all();

        return view('indicadors.index')
            ->with('indicadors', $indicadors);
    }

    /**
     * Show the form for creating a new Indicador.
     *
     * @return Response
     */
    public function create()
    {
        $tiposIndicador = [0 => '--Seleccionar--']+TipoIndicador::where('estado',1)
            ->pluck('nombre','id')
            ->toArray();

        return view('indicadors.create',compact('tiposIndicador'));
    }

    /**
     * Store a newly created Indicador in storage.
     *
     * @param CreateIndicadorRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'nombre' => 'required|string|unique:indicador,nombre',
            'estado' => 'required'
        ]);
        $this->validator($request);
        $input = $request->all();

        $indicador = $this->indicadorRepository->create($input);
        Flash::success('Indicador saved successfully.');

        return redirect(route('indicadors.index'));
    }

    /**
     * Display the specified Indicador.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        //@id = EstructuraIndicador -> indicador_id, estruc_crite_id, id
        $url_par = explode('_',$id);
        $indicador = $this->indicadorRepository->findWithoutFail($url_par[0]);

        if (empty($indicador)) {
            Flash::error('Indicador not found');

            return redirect(route('indicadors.index'));
        }

        $modelo = EstructuraCriterios::findOrFail($url_par[1]);

        $evidencias = Evidencia::where('estado',1)->get();

        $ee_array = EstructuraEvidencias::leftjoin('estructura_indicadores','estructura_indicadores.id','=','estructura_evidencias.estruc_indic_id')
            ->leftjoin('estructura_criterios','estructura_criterios.id','=','estructura_indicadores.estruc_crite_id')
            ->where('estructura_criterios.modelo_id',$modelo->modelo_id)
            ->pluck('estructura_evidencias.evidencia_id')
            ->toArray();

        $estrucEvidencias = EstructuraEvidencias::where('estruc_indic_id',$url_par[2])->get();

        return view('indicadors.show',compact('indicador','modelo','evidencias','ee_array','estrucEvidencias','id'));
    }

    /**
     * Show the form for editing the specified Indicador.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $indicador = $this->indicadorRepository->findWithoutFail($id);
        if (empty($indicador)) {
            Flash::error('Indicador not found');
            return redirect(route('indicadors.index'));
        }

        $tiposIndicador = [0 => '--Seleccionar--']+TipoIndicador::where('estado',1)
                ->pluck('nombre','id')
                ->toArray();

        return view('indicadors.edit',compact('tiposIndicador','indicador'));
    }

    /**
     * Update the specified Indicador in storage.
     *
     * @param  int              $id
     * @param UpdateIndicadorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIndicadorRequest $request)
    {
        request()->validate([
            'nombre' => 'required|string|unique:indicador,nombre,'.$id,
            'estado' => 'required'
        ]);
        $indicador = $this->indicadorRepository->findWithoutFail($id);

        if (empty($indicador)) {
            Flash::error('Indicador not found');

            return redirect(route('indicadors.index'));
        }

        $input=$request->all();

        $indicador = $this->indicadorRepository->update($input, $id);

        Flash::success('Indicador updated successfully.');

        return redirect(route('indicadors.index'));
    }

    /**
     * Remove the specified Indicador from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $indicador = $this->indicadorRepository->findWithoutFail($id);

        if (empty($indicador)) {
            Flash::error('Indicador not found');

            return redirect(route('indicadors.index'));
        }

        $this->indicadorRepository->delete($id);

        Flash::success('Indicador deleted successfully.');

        return redirect(route('indicadors.index'));
    }

    public function validator(Request $request){
        $request->validate([
            'tipo_indicador_id' => ['required', new MayoraCero],
        ]);
    }
}
