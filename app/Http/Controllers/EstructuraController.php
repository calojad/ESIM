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
}
