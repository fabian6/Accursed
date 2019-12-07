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
//

//*Instructor
Route::get('/evaluar-alumno','ControladorProgramador@evaluar_alumno');
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
