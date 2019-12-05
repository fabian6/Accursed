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

Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::post('login','Auth\LoginController@login');
Route::post('logout','Auth\LoginController@logout')->name('logout');


Route::get('register','Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register','Auth\RegisterController@register');


Route::get('password/reset','Auth\FogotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email','Auth\FogotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}','Auth\FogotPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset','Auth\FogotPasswordController@reset');

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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
