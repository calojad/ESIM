<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsuarioAsignacion;
use App\Models\Carrera;
use App\Models\Periodo;
use Flash;
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
        $numRow = 0;
        return view('usuario_asignacion.create',compact('user','carreras','periodos','ua_array','numRow'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId = $request->get('usuario');
        $periodoId = $request->get('periodo');
        $carreras = $request->get('carreras');
        foreach ($carreras as $carrera) {
            UsuarioAsignacion::updateOrCreate(
                ['usuario_id' => $userId, 'periodo_id' => $periodoId, 'carrera_id' => $carrera]
            );
        }
        Flash::success('Carreras Asignadas exitosamente.');
        return json_encode(['url' => route('usuarioasignacion.show',$request->get('usuario'))]);
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

        return view('usuario_asignacion.show',compact('user','userAsignaciones','userPeriodos'));
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
        //
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

        return redirect(route('usuarioasignacion.show',$uasignacion->usuario_id));
    }
    
    public function obtCarreraPeriodo($pId,$uId){
        $caAsig = UsuarioAsignacion::where('usuario_id', $uId)
                    ->where('periodo_id',$pId)
                    ->pluck('carrera_id')->toArray();
        $carreras = Carrera::all();
        return json_encode(['carreras' => $carreras,'caAsig' => $caAsig]);
    }
}
