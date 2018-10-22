<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Unidad;
use App\Models\Carrera;
use App\Models\UnidadCarrera;
use Laracasts\Flash\Flash;

class UnidadCarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unidades = Unidad::select(DB::raw('unidad.id, unidad.nombre, (SELECT COUNT(unidad_carrera.carrera_id) FROM unidad_carrera WHERE unidad_carrera.unidad_id=unidad.id) as num_carreras, unidad.tipo_unidad_id'))
                     ->groupBy('unidad.id','unidad.nombre','unidad.tipo_unidad_id')
                     ->get();
        $classSede = [1=>'bg-green',2=>'bg-aqua',3=>'bg-yellow'];
        $iconSede = [1=>'fa-building',2=>'fa-home',3=>'fa-university'];
        return view('unidad_carrera.index', compact('unidades','classSede','iconSede'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $des=2;
        $unidad = Unidad::find($id);
        $carreras = Carrera::all();
        $u_carreras = UnidadCarrera::where('unidad_id', $id)->get();
        $uc_array = UnidadCarrera::where('unidad_id', $id)->pluck('carrera_id')->toArray();
        return view('unidad_carrera.edit', compact('unidad', 'u_carreras', 'carreras', 'uc_array','des'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $des=1;
        $unidad = Unidad::find($id);
        $carreras = Carrera::all();
        $u_carreras = UnidadCarrera::where('unidad_id', $id)->get();
        $uc_array = UnidadCarrera::where('unidad_id', $id)->pluck('carrera_id')->toArray();
        return view('unidad_carrera.edit', compact('unidad', 'u_carreras', 'carreras', 'uc_array','des'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $carreras = $request->get('carreras');
        foreach ($carreras as $carrera) {
            UnidadCarrera::updateOrCreate(
                ['unidad_id' => $id, 'carrera_id' => $carrera ]
            );
        }
        
        return redirect(route('unidadcarrera.edit', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ucarrera = UnidadCarrera::find($id);
        if (empty($ucarrera)) {
            Flash::error('Carrera en Unidad not found');
            return redirect(route('unidadcarrera.index'));
        }
        $ucarrera->delete();
        Flash::success('Carrera quitada de Unidada successfully.');

        return redirect(route('unidadcarrera.edit',$ucarrera->unidad_id));
    }
}
