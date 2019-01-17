<?php

namespace App\Http\Controllers;

use App\Models\Criterio;
use App\Models\EstructuraCriterios;
use App\Models\Modelo;
use Illuminate\Http\Request;

class EstructuraController extends Controller
{
    public function postAddcriterios(Request $request){
        $modelo = $request->get('modelo_id');
        $criterios = $request->get('criteriosSel');
        foreach ($criterios as $criterio){
            EstructuraCriterios::updateOrCreate(
                ['modelo_id' => $modelo, 'criterio_id' => $criterio]
            );
        }
        return redirect(route('modelos.show',$modelo));
    }
    public function postAddsubcriterios(Request $request){
        dd($request->all());
        $modelo = $request->get('modelo_id');
        $criterios = $request->get('criteriosSel');
        $criterioPadre = $request->get('criterioId');
        foreach ($criterios as $criterio){
            EstructuraCriterios::updateOrCreate(
                ['modelo_id' => $modelo, 'criterio_id' => $criterio],
                ['nivel' => 2,'criterio_padre_id' => $criterioPadre]
            );
        }
        return redirect(route('modelos.show',$modelo));
    }
    public function getSubcriterios($criterioPadreId){

    }
}
