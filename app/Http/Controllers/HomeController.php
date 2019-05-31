<?php

namespace App\Http\Controllers;

use App\Models\Matriz;
use App\Models\UsuarioAsignacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rol = Auth::user()->rol;
        if($rol == 1){

            return view('home_admin');
        }elseif($rol == 2){

            $asignacionesCarreras = UsuarioAsignacion::where('usuario_id',Auth::user()->id)
                ->where('carrera_id','>',0)
                ->get();
            $asignacionesDeparts = UsuarioAsignacion::where('usuario_id',Auth::user()->id)
                ->where('departamento_id','>',0)
                ->get();

            $matrices = $this->obtMatricesUsuario(Auth::user()->id,$asignacionesDeparts);

            return view('home_usuario', compact('asignacionesCarreras','asignacionesDeparts','matrices'));
        }
    }
    public function homeMatrices(){
        $asignacionesDeparts = UsuarioAsignacion::where('usuario_id',Auth::user()->id)
            ->where('departamento_id','>',0)
            ->get();
        $matrices = $this->obtMatricesUsuario(Auth::user()->id,$asignacionesDeparts);
        return view('matrizs.matrices_eval_admin',compact('matrices'));
    }

    public function obtMatricesUsuario($id,$asignacionesDeparts){
        $matrices =  UsuarioAsignacion::join('matriz',function ($leftjoin){
            $leftjoin->on('matriz.carrera_id','=','usuario_asignacion.carrera_id')
                ->on('matriz.periodo_id','=','usuario_asignacion.periodo_id');
        })
            ->where('usuario_asignacion.usuario_id',$id)
            ->groupBy('usuario_asignacion.periodo_id')
            ->select('usuario_asignacion.carrera_id','usuario_asignacion.periodo_id','matriz.nombre','matriz.periodo_id as mz_periodo','matriz.tipo_matriz_id','matriz.tipo_evaluacion_id','matriz.carrera_id as mz_carrera')
            ->get();
        if(count($asignacionesDeparts)>0){
            $m_dep = UsuarioAsignacion::leftjoin('matriz','matriz.periodo_id','=','usuario_asignacion.periodo_id')
                ->where('matriz.tipo_matriz_id',2)
                ->where('usuario_asignacion.usuario_id', $id)
                ->groupBy('matriz.periodo_id')
                ->select('usuario_asignacion.carrera_id', 'usuario_asignacion.periodo_id', 'matriz.nombre', 'matriz.periodo_id as mz_periodo', 'matriz.tipo_matriz_id', 'matriz.tipo_evaluacion_id', 'matriz.carrera_id as mz_carrera')
                ->get();
            foreach ($m_dep as $md){
                $matrices->push($md);
            }
        }

        return $matrices;
    }
}
