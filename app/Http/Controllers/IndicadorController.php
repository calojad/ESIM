<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIndicadorRequest;
use App\Http\Requests\UpdateIndicadorRequest;
use App\Models\Formulas;
use App\Models\GrupoValor;
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
        $gruposValor = GrupoValor::where('estado',1)
            ->pluck('nombre','id');
        $formulas = Formulas::where('estado',1)
            ->pluck('nombre','id');
        return view('indicadors.create',compact('tiposIndicador','gruposValor','formulas'));
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
        $this->validator($request);
        $input = $request->all();

        if($input['tipo_indicador_id'] == 1)
            $input['formula_id']=null;
        else if($input['tipo_indicador_id'] == 2)
            $input['grupo_valor_id']=null;

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
        $indicador = $this->indicadorRepository->findWithoutFail($id);

        if (empty($indicador)) {
            Flash::error('Indicador not found');

            return redirect(route('indicadors.index'));
        }

        return view('indicadors.show')->with('indicador', $indicador);
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
        $gruposValor = GrupoValor::where('estado',1)
            ->pluck('nombre','id');
        $formulas = Formulas::where('estado',1)
            ->pluck('nombre','id');

        return view('indicadors.edit',compact('tiposIndicador','gruposValor','formulas','indicador'));
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
        $indicador = $this->indicadorRepository->findWithoutFail($id);

        if (empty($indicador)) {
            Flash::error('Indicador not found');

            return redirect(route('indicadors.index'));
        }

        $input=$request->all();

        if($input['tipo_indicador_id'] == 1)
            $input['formula_id'] = null;
        else if($input['tipo_indicador_id'] == 2)
            $input['grupo_valor_id'] = null;
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
