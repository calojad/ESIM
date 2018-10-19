<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unidad;
use App\Models\Carrera;
use App\Models\UnidadCarrera;

class UnidadCarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unidad = Unidad::find($id);
        $carreras = Carrera::all();
        $u_carreras = UnidadCarrera::where('unidad_id',$id)->get();
        $uc_array = UnidadCarrera::where('unidad_id',$id)->pluck('carrera_id')->toArray();
        return view('unidad_carrera.edit',compact('unidad','u_carreras','carreras','uc_array'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $carreras = $request->get('carreras');
        $unidadcarrera = UnidadCarrera::where('unidad_id',$id)->get();
        if(count($unidadcarrera) > 0){
            foreach ($unidadcarrera as $carrera) {
                $carrera->delete();
            }
        }
        $data['unidad_id'] = $id;
        foreach ($carreras as $carrera) {
            $data['carrera_id'] = $carrera;
            UnidadCarrera::create($data);
        }
        return redirect(route('unidadcarrera.edit',$id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
