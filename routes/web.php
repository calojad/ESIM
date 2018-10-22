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
});