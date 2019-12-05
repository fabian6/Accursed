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

Route::get('/', 'ControladorCursos@index');
Route::get('login', function () {
    return view('sesion.login');
});
Route::get('register', function () {
    return view('sesion.register');
});
// Programador de Cursos
//*Instructor
Route::get('/evaluar-alumno','ControladorProgramador@evaluar_alumno');
Route::get('/enviar-evaluacion-alumno','ControladorProgramador@enviar_evaluacion_alumno');

// CURSOS DE ACTUALIZACION
Route::resource('cursos','ControladorCursos');
Route::post('inscribir','ControladorCursos@inscribir')->name('inscribirse');
//