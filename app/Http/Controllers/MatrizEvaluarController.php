<?php

namespace App\Http\Controllers;

use App\Models\EstructuraCriterios;
use App\Models\EstructuraElementos;
use App\Models\Matriz;

class MatrizEvaluarController extends Controller
{
    public function getIndex($id){

        $matriz = Matriz::findOrFail($id);
        $elementos = EstructuraElementos::leftjoin('estructura_evidencias','estructura_elementos.estruc_evide_id','=','estructura_evidencias.id')
            ->leftjoin('estructura_indicadores','estructura_evidencias.estruc_indic_id','=','estructura_indicadores.id')
            ->leftjoin('estructura_criterios','estructura_indicadores.estruc_crite_id','=','estructura_criterios.id')
            ->where('estructura_criterios.modelo_id',$matriz->modelo_id)
            ->select('estructura_elementos.estruc_evide_id','estructura_elementos.elemento_id','estructura_evidencias.estruc_indic_id','estructura_evidencias.evidencia_id','estructura_indicadores.estruc_crite_id','estructura_indicadores.indicador_id','estructura_criterios.criterio_id','estructura_criterios.padre_id')
            ->get();

        $criterios = EstructuraElementos::leftjoin('estructura_evidencias','estructura_elementos.estruc_evide_id','=','estructura_evidencias.id')
            ->leftjoin('estructura_indicadores','estructura_evidencias.estruc_indic_id','=','estructura_indicadores.id')
            ->leftjoin('estructura_criterios','estructura_indicadores.estruc_crite_id','=','estructura_criterios.id')
            ->where('estructura_criterios.modelo_id',$matriz->modelo_id)
            ->select('estructura_elementos.estruc_evide_id','estructura_criterios.criterio_id')
            ->groupBy('estructura_indicadores.estruc_crite_id','estructura_criterios.criterio_id')
            ->orderBy('estructura_criterios.secuencia','asc')
            ->get();

        $tabActiva = $criterios[0]->criterio_id;

        return view('matriz_evaluar.evaluacion', compact('matriz','elementos','criterios','tabActiva'));
    }
}