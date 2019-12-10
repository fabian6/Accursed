<?php

namespace App\Http\Controllers;

use App\Curso;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Auth;

class ControladorProgramador extends Controller{

    public function __construct(){
        $this->middleware('auth:programador');
    }

    public function instructor_cursos(){
        $cursos = Curso::all();
        $cursosProgramador = Curso::whereHas('programadores.cursos', function ($query) {
            $programador = Auth::user();
            $query->where('programador_curso_id',$programador->id );
        })->get();
        return view('programadorCursos.instructor_cursos', compact('cursosProgramador'));
    }

    public function evaluar_alumno(){
        $cursos = Curso::all();
        $cursosProgramador = Curso::whereHas('programadores.cursos', function ($query) {
            $programador = Auth::user();
            $query->where('programador_curso_id',$programador->id );
        })->get();
        return view('programadorCursos.instructor_evaluarAlumno',compact('cursosProgramador'));
    }

    public function enviar_evaluacion_alumno(Request $request){
        //$cursol = Curso::find($id);
        //dd($cursol->usuarios);
        $curso = Curso::find($request->curso);
        //dd($curso);
        $cursosProgramador = Curso::whereHas('programadores.cursos', function ($query) {
            $programador = Auth::user();
            $query->where('programador_curso_id',$programador->id );
        })->get();
        return view('programadorCursos.instructor_enviarEvaluacionAlumno',compact('cursosProgramador','curso'));
    }

    // Responsable del curso
    public function crear_curso(){
        $cursosProgramador = Curso::whereHas('programadores.cursos', function ($query) {
            $programador = Auth::user();
            $query->where('programador_curso_id',$programador->id );
        })->get();
        return view('programadorCursos.responsable_crearCurso',compact('cursosProgramador'));
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
        return redirect('instructor-cursos');
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
