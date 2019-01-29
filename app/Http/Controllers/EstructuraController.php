<?php

namespace App\Http\Controllers;

use App\Models\EstructuraCriterios;
use App\Models\EstructuraIndicadores;
use Illuminate\Http\Request;
use Flash;

class EstructuraController extends Controller
{
    public function postAddcriterios(Request $request)
    {
        $modelo = $request->get('modelo_id');
        $criterios = $request->get('criteriosSel');
        if (empty($criterios)){
            Flash::error('No se ha seleccionado ningun elemento.');
            return redirect(route('modelos.show', $modelo));
        }

        foreach ($criterios as $criterio) {
            EstructuraCriterios::updateOrCreate(
                ['modelo_id' => $modelo, 'criterio_id' => $criterio]
            );
        }
        Flash::success('Criterios agregados.');
        return redirect(route('modelos.show', $modelo));
    }

    public function postAddsubcriterios(Request $request)
    {
//        dd($request->all());
        $modelo = $request->get('modelo_id');
        $criterios = $request->get('criteriosSel');
        if (empty($criterios)){
            Flash::error('No se ha seleccionado ningun elemento.');
            return redirect(route('modelos.show', $modelo));
        }

        $criterioPadre = $request->get('criterioPadreId');
        $nivel = $request->get('nivelHijo');
        foreach ($criterios as $criterio) {
            EstructuraCriterios::updateOrCreate(
                ['modelo_id' => $modelo, 'criterio_id' => $criterio],
                ['nivel' => $nivel, 'padre_id' => $criterioPadre]
            );
        }
        Flash::success('Subcriterios agregados.');
        return redirect(route('modelos.show', $modelo));
    }

    public function  postAddindicadores(Request $request){
        $padre = EstructuraCriterios::find($request->get('criterioPadreId'));
        $modelo = $request->get('modelo_id');
        if(empty($padre)){
            Flash::error('No se encontró el Criterio.');
            return redirect(route('modelos.show', $modelo));
        }
        $criterioPadre = $request->get('criterioPadreId');
        foreach ($request->get('indicadorSel') as $indicador) {
            EstructuraIndicadores::updateOrCreate(
                ['estruc_crite_id' => $criterioPadre, 'indicador_id' => $indicador]
            );
        }
        Flash::success('Indicador(es) agregado(s).');
        return redirect(route('modelos.show', $modelo));

    }

    public function getSubcriteriosde($criterioPadreId)
    {
        $subcriterios = EstructuraCriterios::leftjoin('criterio', 'estructura_criterios.criterio_id', '=', 'criterio.id')
            ->where('estructura_criterios.padre_id', $criterioPadreId)
            ->select('criterio.id', 'criterio.nombre', 'criterio.abreviado')
            ->get();
        return json_encode($subcriterios);
    }

    public function getDestroy($id){
        $estruCriterio = EstructuraCriterios::find($id);

        if (empty($estruCriterio)) {
            Flash::error('Criterio no encontrado en la Estructura');

            return redirect(route('modelos.show',$id));
        }

        $estruCriterio->delete();

        Flash::success('Elemento quitado de la estructura.');
    }
}
