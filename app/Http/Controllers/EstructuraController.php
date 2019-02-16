<?php

namespace App\Http\Controllers;

use App\Models\Criterio;
use App\Models\EstructuraCriterios;
use App\Models\EstructuraElementos;
use App\Models\EstructuraEvidencias;
use App\Models\EstructuraIndicadores;
use App\Models\Indicador;
use Illuminate\Http\Request;
use Flash;

class EstructuraController extends Controller
{
    public function postAddcriterios(Request $request)
    {
        $modelo = $request->get('modelo_id');
        $criterios = $request->get('criteriosSel');
        if (empty($criterios)) {
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
        if (empty($criterios)) {
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

    public function postAddindicadores(Request $request)
    {
        $padre = EstructuraCriterios::find($request->get('criterioPadreId'));
        $modelo = $request->get('modelo_id');
        if (empty($padre)) {
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

    public function postAddevidencias(Request $request)
    {
        $estruIndicador = $request->get('estrucIndicador');
        $evidencias = $request->get('evidenciaSel');
        $indicador = $request->get('indicador_id');
        if (!empty($evidencias)) {
            foreach ($evidencias as $evi) {
                EstructuraEvidencias::updateOrCreate(
                    ['estruc_indic_id' => $estruIndicador, 'evidencia_id' => $evi]
                );
            }
        } else {
            Flash::error('No se ha seleccionado ningun elemento.');
            return redirect(route('indicadors.show', $indicador));
        }

        Flash::success('Evidencia(s) agregada(s).');
        return redirect(route('indicadors.show', $indicador));
    }

    public function postAddelemento(Request $request)
    {
        $estrucEvidencia = $request->get('estrucEvidencia');
        $evidencia = $request->get('evidencia_id');
        $elementos = $request->get('elementoSel');

        if (!empty($elementos)) {
            foreach ($elementos as $ele) {
                EstructuraElementos::updateOrCreate(
                    ['estruc_evide_id' => $estrucEvidencia, 'elemento_id' => $ele]
                );
            }
        } else {
            Flash::error('No se ha seleccionado ningun elemento.');
            return redirect(route('evidencias.show', $evidencia));
        }

        Flash::success('Evidencia(s) agregada(s).');
        return redirect(route('evidencias.show', $evidencia));
    }

    public function postNewCriterio(Request $request)
    {
        $data = $request->all();
        Criterio::create($data);
        Flash::success('Criterio creado.');
        return redirect(route('modelos.show', $data['modelo_id']));
    }

    public function postNewIndicador(Request $request)
    {
        $data = $request->all();

        if ($data['tipo_indicador_id'] == 1)
            $data['formula_id'] = null;
        else if ($data['tipo_indicador_id'] == 2)
            $data['grupo_valor_id'] = null;

        Indicador::create($data);
        Flash::success('Indicador creado.');
        return redirect(route('modelos.show', $data['modelo_id']));
    }

    public function getSubcriteriosde($criterioPadreId)
    {
        $subcriterios = EstructuraCriterios::leftjoin('criterio', 'estructura_criterios.criterio_id', '=', 'criterio.id')
            ->where('estructura_criterios.padre_id', $criterioPadreId)
            ->select('criterio.id', 'criterio.nombre', 'criterio.abreviado')
            ->get();
        return json_encode($subcriterios);
    }

    public function getDestroy($id,$nivel)
    {
        $elemento = null;
        if ($nivel !== 'undefined'){
            $elemento = EstructuraCriterios::find($id);
        }else{
            $elemento = EstructuraIndicadores::find($id);
        }

        if (empty($elemento)) {
            Flash::error('Elemento no encontrado en la Estructura');
            return json_encode('Error');
        }

        $elemento->delete();

        Flash::success('Elemento quitado de la estructura.');
        return json_encode('Success');
    }

    public function getDestroyEvidencia($id){
        $evidencia = EstructuraEvidencias::find($id);
        if(empty($evidencia)){
            Flash::error('Evidencia no encontrado en la Estructura');
            return json_encode('Error');
        }

        $evidencia->delete();

        Flash::success('Evidencia Quitada.');
        return json_encode('Success');
    }
    public function getDestroyElemento($id){
        $elemento = EstructuraElementos::find($id);
        if(empty($elemento)){
            Flash::error('Elemento no encontrado en la Estructura');
            return json_encode('Error');
        }

        $elemento->delete();

        Flash::success('Elemento Quitada.');
        return json_encode('Success');
    }
}
