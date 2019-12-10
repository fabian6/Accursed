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




//vista de inicio
Route::get('/', 'ControladorCursos@index')->name('home');

//Responsable del curso
Route::get('/crear-curso','ControladorProgramador@crear_curso')->name('crear_curso');
Route::post('/crear-curso', 'ControladorProgramador@programadorCrearCurso')->name('crearcurso');

//*Instructor
Route::get('/evaluar-alumno','ControladorProgramador@evaluar_alumno')->name('evaluar-alumno');
Route::get('/enviar-evaluacion-alumno','ControladorProgramador@enviar_evaluacion_alumno');

// CURSOS DE ACTUALIZACION
Route::resource('cursos','ControladorCursos');
Route::post('inscribir','ControladorCursos@inscribir')->name('inscribirse');
//
// login
Route::get('login','Auth\LoginController@mostrarFormLogin')->name('login');
Route::post('login','Auth\LoginController@login');
Route::post('logout','Auth\LoginController@logout')->name('cerrarSesion');
//
//registro
Route::get('register','Auth\RegisterController@mostrarFormRegistro')->name('register');
Route::post('register','Auth\RegisterController@registrarUsuario')->name('registrarUsuario');
//

// Registrar usuario a un curso
Route::post('registrarAcurso','ControladorUsuario@inscribirCurso')->name('inscribirCurso')->middleware('auth');
Route::get('tus-cursos', 'ControladorUsuario@listaCursosInscrito')->name('cursosInscrito');

// *Administrador
Route::get('administrar-registros','Auth\RegisterController@mostrarFormRegistroAdmin')->name('administrar-registros');
Route::post('administrar-registros','Auth\RegisterController@administrarProgramador')->name('administrarRegistros');
Route::post('administrar-registros-DD','Auth\RegisterController@administrarDivisionalyDirector')->name('administrarRegistrosDD');
Route::get('tus-cursos', 'ControladorUsuario@listaCursosInscrito')->name('cursosInscrito')->middleware('auth');
//

//Evaluar el curso del cual el usuario se inscribio
Route::get('evaluar-curso','ControladorUsuario@mostrarFormEvaluar')->name('mostrarFormEvaluar')->middleware('auth');
Route::post('evaluar-curso','ControladorUsuario@evaluarCurso')->name('evaluarCurso')->middleware('auth');
// Route::get('cursos-a-evaluar','ControladorCursos@cursosAevaluar')->name('listaCursosEvaluar');
//

//Evaluar encargado del curso de actualizacion al cual el usuario se inscribio
Route::get('evaluar-encargado','ControladorUsuario@mostrarEvaluarEncargado')->name('mostrarEvaluarEncargado')->middleware('auth');
Route::post('evaluar-encargado','ControladorUsuario@evaluarEncargado')->name('evaluarEncargado')->middleware('auth');

// El login del programador
Route::get('loginPro','Auth\LoginProController@mostrarLoginPro')->name('loginPro');
Route::post('loginPro','Auth\LoginProController@loginPro')->name('loginPro.submit');