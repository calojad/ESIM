<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateModeloRequest;
use App\Http\Requests\UpdateModeloRequest;
use App\Models\Criterio;
use App\Models\EstructuraCriterios;
use App\Models\EstructuraIndicadores;
use App\Models\Formulas;
use App\Models\GrupoValor;
use App\Models\Indicador;
use App\Models\TipoIndicador;
use App\Repositories\ModeloRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ModeloController extends AppBaseController
{
    /** @var  ModeloRepository */
    private $modeloRepository;

    public function __construct(ModeloRepository $modeloRepo)
    {
        $this->modeloRepository = $modeloRepo;
    }

    /**
     * Display a listing of the Modelo.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->modeloRepository->pushCriteria(new RequestCriteria($request));
        $modelos = $this->modeloRepository->all();

        return view('modelos.index')
            ->with('modelos', $modelos);
    }

    /**
     * Show the form for creating a new Modelo.
     *
     * @return Response
     */
    public function create()
    {
        return view('modelos.create');
    }

    /**
     * Store a newly created Modelo in storage.
     *
     * @param CreateModeloRequest $request
     *
     * @return Response
     */
    public function store(CreateModeloRequest $request)
    {
        request()->validate([
            'nombre' => 'required|string|unique:modelo,nombre',
            'estado' => 'required'
        ]);
        $input = $request->all();

        $modelo = $this->modeloRepository->create($input);

        Flash::success('Modelo saved successfully.');

        return redirect(route('modelos.index'));
    }

    /**
     * Display the specified Modelo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $modelo = $this->modeloRepository->findWithoutFail($id);

        if (empty($modelo)) {
            Flash::error('Modelo not found');
            return redirect(route('modelos.index'));
        }

        $ec_array = EstructuraCriterios::where('modelo_id', $id)->pluck('criterio_id')->toArray();
        $ei_array = EstructuraIndicadores::leftjoin('estructura_criterios','estructura_criterios.id','=','estructura_indicadores.estruc_crite_id')
            ->where('estructura_criterios.modelo_id',$id)
            ->pluck('estructura_indicadores.indicador_id')
            ->toArray();

        $criterios = Criterio::where('estado', 1)->get();
        $indicadores = Indicador::where('estado',1)->get();

        $treev = $this->treeViewCriterios($id);

        $tiposIndicador = [0 => '--Seleccionar--']+TipoIndicador::where('estado',1)
                ->pluck('nombre','id')
                ->toArray();
        $gruposValor = GrupoValor::where('estado',1)
            ->pluck('nombre','id');
        $formulas = Formulas::where('estado',1)
            ->pluck('nombre','id');

        return view('modelos.show', compact('modelo', 'criterios', 'ec_array', 'treev','indicadores','ei_array','tiposIndicador','gruposValor','formulas'));
    }

    public function treeViewCriterios($id)
    {
        $Categorys = EstructuraCriterios::where('nivel', '=', 1)
            ->where('modelo_id',$id)
            ->orderby('secuencia','asc')
            ->get();
        $tree = '<ul>';
        foreach ($Categorys as $Category) {
            $tree .= '<li><a data-id="'.$Category->id.'" data-nivel="'.$Category->nivel.'" data-secuencia="'.$Category->secuencia.'">' . $Category->secuencia.' - '.$Category->criterio->nombre. '</a>';
            // Se verifica si tiene subcriterios
            if ($Category->childs->count()) {
                $tree .= $this->childView($Category);
            }
            //Se verifica si tiene indicadores
            if ($Category->estructuraIndicadores->count()){
                $tree .= $this->childViewIndicador($Category);
            }
        }
        $tree .= '</ul>';
        return $tree;
//        return view('files.treeview', compact('tree'));
    }

    public function childView($Category)
    {
        $html = '<ul>';
        foreach ($Category->childs as $arr) {
            // Verifica si hay mas subcriterios
            if ($arr->childs->count()) {
                $html .= '<li><a data-id="'.$arr->id.'" data-nivel="'.$arr->nivel.'" data-secuencia="'.$arr->secuencia.'">'.$arr->secuencia.' - '.$arr->criterio->nombre.'</a>';
                $html .= $this->childView($arr);
            } else {
                $html .= '<li><a data-id="'.$arr->id.'" data-nivel="'.$arr->nivel.'" data-secuencia="'.$arr->secuencia.'">'.$arr->secuencia.' - '.$arr->criterio->nombre .'</a>';
            }
            // Verifica si hay Indicadores
            if ($arr->estructuraIndicadores->count()){
                $html.= $this->childViewIndicador($arr);
            }
            $html .= "</li>";
        }

        $html .= "</ul>";
        return $html;
    }
    public function childViewIndicador($Criterio)
    {
        $html = '<ul>';
        foreach ($Criterio->estructuraIndicadores as $indi) {
                $html .= '<li><a data-id="'.$indi->id .'" data-href="'.route('indicadors.show',$indi->indicador_id.'_'.$indi->estruc_crite_id.'_'.$indi->id).'" data-nmevide="'.$indi->estructuraEvidencias->count().'" data-secuencia="'.$indi->secuencia.'">'.$indi->indicador->nombre.'</a>';
//            }
            $html .= "</li>";
        }

        $html .= "</ul>";
        return $html;
    }

    /**
     * Show the form for editing the specified Modelo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $modelo = $this->modeloRepository->findWithoutFail($id);

        if (empty($modelo)) {
            Flash::error('Modelo not found');

            return redirect(route('modelos.index'));
        }

        return view('modelos.edit')->with('modelo', $modelo);
    }

    /**
     * Update the specified Modelo in storage.
     *
     * @param  int $id
     * @param UpdateModeloRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateModeloRequest $request)
    {
        request()->validate([
            'nombre' => 'required|string|unique:modelo,nombre,'.$id,
            'estado' => 'required'
        ]);
        $modelo = $this->modeloRepository->findWithoutFail($id);

        if (empty($modelo)) {
            Flash::error('Modelo not found');

            return redirect(route('modelos.index'));
        }

        $modelo = $this->modeloRepository->update($request->all(), $id);

        Flash::success('Modelo updated successfully.');

        return redirect(route('modelos.index'));
    }

    /**
     * Remove the specified Modelo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $modelo = $this->modeloRepository->findWithoutFail($id);

        if (empty($modelo)) {
            Flash::error('Modelo not found');

            return redirect(route('modelos.index'));
        }

        $this->modeloRepository->delete($id);

        Flash::success('Modelo deleted successfully.');

        return redirect(route('modelos.index'));
    }
}
