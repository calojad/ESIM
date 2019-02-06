<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateModeloRequest;
use App\Http\Requests\UpdateModeloRequest;
use App\Models\Criterio;
use App\Models\EstructuraCriterios;
use App\Models\EstructuraIndicadores;
use App\Models\Indicador;
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
        return view('modelos.show', compact('modelo', 'criterios', 'ec_array', 'treev','indicadores','ei_array'));
    }

    public function treeViewCriterios($id)
    {
        $Categorys = EstructuraCriterios::where('nivel', '=', 1)
            ->where('modelo_id',$id)
            ->get();
        $tree = '<ul>';
        foreach ($Categorys as $Category) {
            $tree .= '<li><a data-id="'.$Category->id.'" data-nivel="'.$Category->nivel.'">' . $Category->criterio->abreviado.' - '.$Category->criterio->nombre. '</a>';
            // Se verifica si tiene subcriterios
            if (count($Category->childs)) {
                $tree .= $this->childView($Category);
            }
            //Se verifica si tiene indicadores
            if (count($Category->estructuraIndicadores)){
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
            if (count($arr->childs)) {
                $html .= '<li><a data-id="'.$arr->id.'" data-nivel="'.$arr->nivel.'">'.$arr->criterio->abreviado.' - '.$arr->criterio->nombre.'</a>';
                $html .= $this->childView($arr);
            } else {
                $html .= '<li><a data-id="'.$arr->id.'" data-nivel="'.$arr->nivel.'">'.$arr->criterio->abreviado.' - '.$arr->criterio->nombre .'</a>';
            }
            // Verifica si hay Indicadores
            if (count($arr->estructuraIndicadores)){
                $html.= $this->childViewIndicador($arr);
            }
            $html .= "</li>";
        }

        $html .= "</ul>";
        return $html;
    }
    public function childViewIndicador($Category)
    {
        $html = '<ul>';
        foreach ($Category->estructuraIndicadores as $arr) {
            /*if (count($arr->estructuraEvidencias)) {
                $html .= '<li><a data-id="'.$arr->indicador_id.'" data-href="HOLA">'.$arr->indicador->nombre.'</a>';
                $html .= $this->childViewIndicador($arr);
            } else {*/
                $html .= '<li><a data-id="'.$arr->id .'" data-href="'.route('indicadors.show',$arr->indicador_id).'">'.$arr->indicador->nombre.'</a>';
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
