<?php

namespace App\Http\Controllers;

use App\Curso;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class ControladorProgramador extends Controller{

    public function __construct(){
        $this->middleware('auth:programador');
    }

    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:usuarios'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //         'provinencia' => ['required', 'string', 'max:255'],
    //         'rol' => ['required','enum'],
    //         'expediente' => ['required', 'integer', 'max:10'],
    //     ]);
    // }

    public function evaluar_alumno(){
        return view('programadorCursos.instructor_evaluarAlumno');
    }

    public function enviar_evaluacion_alumno(){
        return view('programadorCursos.instructor_enviarEvaluacionAlumno');
    }

    // Responsable del curso
    public function crear_curso(){
        return view('programadorCursos.responsable_crearCurso');
    }

    public function programadorCrearCurso(Request $request){
        $curso = new Curso();
        $curso->nombre = $request->nombre;
        $curso->cupo_disponible= $request->cupo_disponible;
        $curso->descripcion = $request->descripcion;
        $curso->duracion= $request->duracion;
        $curso->fecha_inicio = $request->fecha_inicio;
        $curso->fecha_final = $request->fecha_final;
        $curso->horario = $request->horario;
        $curso->aula = $request->aula;
        $curso->estado = "pendiente";
        //$curso->exclusivo = $request->exclusivo;
        $curso->save();
        return redirect('/login');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
