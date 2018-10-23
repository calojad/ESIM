<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsuarioAsignacion;
use App\Models\Carrera;
use App\Models\Periodo;
use App\User;

class UsuarioAsignacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evaluadores = User::where('rol',2)
                        ->where('estado',1)
                        ->get();
        return view('usuario_asignacion.index', compact('evaluadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user = User::find($id);
        $carreras = Carrera::all();
        $ua_array = UsuarioAsignacion::where('usuario_id', $id)->pluck('carrera_id')->toArray();
        $periodos = [0 => '--Seleccionar--']+Periodo::where('estado','=',1)
                    ->pluck('nombre','id')
                    ->toArray();
        return view('usuario_asignacion.create',compact('user','carreras','periodos','ua_array'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $userPeriodos = UsuarioAsignacion::where('usuario_id',$id)
                        ->select('periodo_id')
                        ->groupBy('periodo_id')
                        ->get();
        $userAsignaciones = UsuarioAsignacion::where('usuario_id',$id)->get();

        return view('usuario_asignacion.show',compact('user','userAsignaciones','carreras','ua_array'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        /*$carreras = $request->get('carreras');
        foreach ($carreras as $carrera) {
            UsuarioAsignacion::updateOrCreate(
                ['usuario_id' => $id, 'carrera_id' => $carrera ],
                ['periodo_id' => 0]
            );
        }
        
        return redirect(route('unidadcarrera.edit', $id));*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $uasignacion = UsuarioAsignacion::find($id);
        if (empty($uasignacion)) {
            Flash::error('Asignacion de Usuario not found');
            return redirect(route('usuarioasignacion.index'));
        }
        $uasignacion->delete();
        Flash::success('Asignacion quitada de Usuario successfully.');

        return redirect(route('usuarioasignacion.edit',$uasignacion->usuario_id));
    }
}
