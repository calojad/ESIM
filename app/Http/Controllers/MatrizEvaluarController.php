<?php

namespace App\Http\Controllers;

use App\Models\Matriz;
use Illuminate\Http\Request;

class MatrizEvaluarController extends Controller
{
    public function getIndex($id){

        $matriz = Matriz::findOrFail($id);

        return view('matriz_evaluar.evaluacion', compact('matriz'));

    }
}