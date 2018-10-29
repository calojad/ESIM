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


//*****RUTAS CON AUTENTICACION
Auth::routes();
//*****GRUPO DE RUTAS
Route::group(['middleware' => 'auth'], function () {
	//***HOME
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/',function(){return view('home');});
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
    //***Usuarios
    Route::resource('users', 'UserController');
    //***Unidades Carreras
    Route::resource('unidadcarrera', 'UnidadCarreraController');
    //***Usuarios Asignaciones
    Route::resource('usuarioasignacion', 'UsuarioAsignacionController');
    Route::get('usuarioasignacion/create/{user}','UsuarioAsignacionController@create')->name('usuarioasignacion.asignar');
    Route::get('usuarioasignacion/obtcarreraceriodo/{periodo}/{user}','UsuarioAsignacionController@obtCarreraPeriodo')->name('usuarioasignacion.cargartabla');
    //***Grupos de Valor
    Route::resource('grupoValors', 'GrupoValorController');
    //***Valoraciones
    Route::resource('valoracions', 'ValoracionController');
    Route::get('valoracions/create/{grupo}', 'ValoracionController@create')->name('valoracions.valoracioncrear');
});