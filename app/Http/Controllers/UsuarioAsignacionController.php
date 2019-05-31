<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
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
        $evaluadores = User::where('estado',1)->get();
        return view('usuario_asignacion.index', compact('evaluadores'));
    }

    /**
     * Asignar Carrera.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user = User::find($id);
        $ua_array = UsuarioAsignacion::where('usuario_id', $id)
            ->where('carrera_id','>',0)
            ->pluck('carrera_id')
            ->toArray();
        $periodos = [0 => '--Seleccionar--']+Periodo::where('estado',1)
                    ->pluck('nombre','id')
                    ->toArray();
        $numRow = 0;
        return view('usuario_asignacion.create',compact('user','periodos','ua_array','numRow'));
    }

    /**
     * Guardar las carreras asignadas.
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
                ['usuario_id' => $userId, 'periodo_id' => $periodoId, 'carrera_id' => $carrera],
                ['departamento_id' => null]
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
        $userPeriodosCarrera = UsuarioAsignacion::where('usuario_id',$id)
            ->where('carrera_id','>',0)
            ->select('periodo_id')
            ->groupBy('periodo_id')
            ->get();
        $userPeriodosDeparts = UsuarioAsignacion::where('usuario_id',$id)
            ->where('departamento_id','>',0)
            ->select('periodo_id')
            ->groupBy('periodo_id')
            ->get();
        $userAsignacionesCarreras = UsuarioAsignacion::where('usuario_id',$id)
            ->where('carrera_id','>',0)
            ->get();
        $userAsignacionesDepartam = UsuarioAsignacion::where('usuario_id',$id)
            ->where('departamento_id','>',0)
            ->get();

        return view('usuario_asignacion.show',compact('user','userAsignacionesCarreras','userPeriodosCarrera','userAsignacionesDepartam','userPeriodosDeparts'));
    }

    /**
     * Asignar Departamento.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $ua_array = UsuarioAsignacion::where('usuario_id', $id)
            ->where('departamento_id','>',0)
            ->pluck('departamento_id')
            ->toArray();
        $periodos = [0 => '--Seleccionar--']+Periodo::where('estado',1)
                ->pluck('nombre','id')
                ->toArray();
        $numRow = 0;
        return view('usuario_asignacion.edit',compact('user','periodos','ua_array','numRow'));
    }

    /**
     * Guardar los departamentos asignados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $userId = $request->get('usuario');
        $periodoId = $request->get('periodo');
        $departamentos = $request->get('departamentos');
        foreach ($departamentos as $depar) {
            UsuarioAsignacion::updateOrCreate(
                ['usuario_id' => $userId, 'periodo_id' => $periodoId, 'departamento_id' => $depar],
                ['carrera_id' => null]
            );
        }
        Flash::success('Departamentos Asignadas exitosamente.');
        return json_encode(['url' => route('usuarioasignacion.show',$request->get('usuario'))]);
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
            ->where('carrera_id','>',0)
            ->pluck('carrera_id')
            ->toArray();
        $carreras = Carrera::where('estado',1)->get();
        return json_encode(['carreras' => $carreras,'caAsig' => $caAsig]);
    }

    public function obtDepartPeriodo($pId,$uId){
        $deAsig = UsuarioAsignacion::where('usuario_id', $uId)
            ->where('periodo_id',$pId)
            ->where('departamento_id','>',0)
            ->pluck('departamento_id')
            ->toArray();
        $departamentos = Departamento::where('estado',1)->get();
        return json_encode(['departamentos' => $departamentos,'deAsig' => $deAsig]);
    }
}
