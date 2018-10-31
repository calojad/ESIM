<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Variables;
use App\Models\Formulas;

class CuantitativosController extends Controller
{
    public function getIndex($tab='V'){
    	$formulas = Formulas::all();
    	$variables = Variables::all();

    	return view('cuantitativos.index',compact('formulas','variables','tab'));
    }
}