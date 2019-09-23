<?php

namespace App\Http\Controllers;

use App\Models\Criterio;
use App\Models\EstructuraCriterios;
use App\Models\EstructuraElementos;
use App\Models\EstructuraEvidencias;
use App\Models\EstructuraIndicadores;
use App\Models\Indicador;
use Flash;
use Illuminate\Http\Request;

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
        $url_id = $request->get('url_id');

        if (!empty($evidencias)) {
            foreach ($evidencias as $evi) {
                EstructuraEvidencias::updateOrCreate(
                    ['estruc_indic_id' => $estruIndicador, 'evidencia_id' => $evi]
                );
            }
        } else {
            Flash::error('No se ha seleccionado ningun elemento.');
            return redirect(route('indicadors.show', $url_id));
        }

        Flash::success('Evidencia(s) agregada(s).');
        return redirect(route('indicadors.show', $url_id));
    }

    public function postAddelemento(Request $request)
    {
        $estrucEvidencia = $request->get('estrucEvidencia');
        $elementos = $request->get('elementoSel');
        $id = $request->get('url_id');

        if (!empty($elementos)) {
            $sec = EstructuraElementos::where('estruc_evide_id',$estrucEvidencia)->max('secuencia');
            $sec = ($sec ?? 0);
            foreach ($elementos as $ele) {
                $sec++;
                EstructuraElementos::updateOrCreate(
                    ['estruc_evide_id' => $estrucEvidencia, 'elemento_id' => $ele],
                    ['secuencia' => $sec]
                );
            }
        } else {
            Flash::error('No se ha seleccionado ningun elemento.');
            return redirect(route('evidencias.show', $id));
        }

        Flash::success('Evidencia(s) agregada(s).');
        return redirect(route('evidencias.show', $id));
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

        Indicador::create($data);
        Flash::success('Indicador creado.');
        return redirect(route('modelos.show', $data['modelo_id']));
    }

    public function postUpdateSecuencia(Request $request){
        foreach ($request->get('secuencias') as $secuencia){
            if($secuencia['tb']==='C'){
                EstructuraCriterios::updateOrCreate(
                    ['id' => $secuencia['id']], ['secuencia' => $secuencia['valor']]
                );
            }else if($secuencia['tb'] === 'I'){
                EstructuraIndicadores::updateOrCreate(
                    ['id' => $secuencia['id']], ['secuencia' => $secuencia['valor']]
                );
            }
        }

        return json_encode('Cargando');
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
