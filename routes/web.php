<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//******RUTAS SIN AUTENTICACION
Route::get('/', function () {
    return view('welcome');
});

//*****RUTAS CON AUTENTICACION
Auth::routes();
//****************GRUPO DE RUTAS***************

//=============Administrador============
Route::middleware(['auth', 'admin'])->group(function () {
    //***HOME
    Route::get('/home', 'HomeController@index')->name('home');
    //***Matrices a evaluar (Administrador)
    Route::get('/home/matrices', 'HomeController@homeMatrices');
    //***Ubicaciones
    Route::resource('ubicacions', 'UbicacionController');
    //***Tipo Unidades
    Route::resource('tipoUnidads', 'TipoUnidadController');
    //***Tipo Periodos
    Route::resource('tipoPeriodos', 'TipoPeriodoController');
    //***Tipo Evaluaciones
    Route::resource('tipoEvaluacions', 'TipoEvaluacionController');
    //***Tipo Indicadores
    Route::resource('tipoIndicadors', 'TipoIndicadorController');
    //***Periodos
    Route::resource('periodos', 'PeriodoController');
    //***Unidades
    Route::resource('unidads', 'UnidadController');
    //***Carreras
    Route::resource('carreras', 'CarreraController');
    //***Departamentos
    Route::resource('departamentos', 'DepartamentoController');
    //***Usuarios
    Route::resource('users', 'UserController');
    //***Unidades Carreras
    Route::resource('unidadcarrera', 'UnidadCarreraController');
    //***Usuarios Asignaciones
    Route::resource('usuarioasignacion', 'UsuarioAsignacionController', ['except' => ['update']]);
    Route::get('usuarioasignacion/asing-carrera/{user}', 'UsuarioAsignacionController@create')->name('usuarioasignacion.asignarcarrera');
    Route::get('usuarioasignacion/asing-departamento/{user}', 'UsuarioAsignacionController@edit')->name('usuarioasignacion.asignardeparta');
    Route::get('usuarioasignacion/obtcarreraperiodo/{periodo}/{user}', 'UsuarioAsignacionController@obtCarreraPeriodo');
    Route::get('usuarioasignacion/obtdepartperiodo/{periodo}/{user}', 'UsuarioAsignacionController@obtDepartPeriodo');
    Route::post('usuarioasignacion/{id}', 'UsuarioAsignacionController@update')->name('usuarioasignacion.update');
    //***Grupos de Valor
    Route::resource('grupoValors', 'GrupoValorController');
    //***Valoraciones
    Route::resource('valoracions', 'ValoracionController');
    Route::get('valoracions/create/{grupo}', 'ValoracionController@create')->name('valoracions.valoracioncrear');
    //***Cuantitativos
    AdvancedRoute::controller('/cuantitativos', 'CuantitativosController');
    //***Formulas
    Route::resource('formulas', 'FormulasController');
    //***Variables
    Route::resource('variables', 'VariablesController');
    //***Formulas Variables
    Route::resource('formulaVariables', 'FormulaVariableController');
    Route::get('formulaVariables/create/{formula}', 'FormulaVariableController@create')->name('formulaVariables.formulasVariablesagregar');
    //***Criterios
    Route::resource('criterios', 'CriterioController');
    //***Indicadores
    Route::resource('indicadors', 'IndicadorController');
    //***Evidencias
    Route::resource('evidencias', 'EvidenciaController');
    //***Elementos
    Route::resource('elementos', 'ElementoController');
    //***Modelos
    Route::resource('modelos', 'ModeloController');
    //***Estructura
    AdvancedRoute::controller('/estructura', 'EstructuraController');
    //***Matriz
    Route::resource('matrizs', 'MatrizController');
    //***MatrizEvaluar
    AdvancedRoute::controller('/evaluar/matriz', 'MatrizEvaluarController');
    //***Responsable
    Route::resource('responsables', 'ResponsableController');
    //***Tipo Matriz
    Route::resource('tipoMatrizs', 'TipoMatrizController');
});

//================Usuario===================
Route::middleware(['auth'])->group(function () {
    //***Home usuario
    Route::get('/home', 'HomeController@index')->name('home');
    //***MatrizEvaluar
    AdvancedRoute::controller('/evaluar/matriz', 'MatrizEvaluarController');
});