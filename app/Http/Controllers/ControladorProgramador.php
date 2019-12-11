<?php

namespace App\Http\Controllers;

use App\Curso;
<<<<<<< HEAD
use App\ProgramadorCurso;
=======
use App\Usuario;
>>>>>>> 65dcbc2bbe78842607b73c3435906b5bcbf9ed39
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
        //$cursos = Curso::all();
        $cursosProgramador = Curso::whereHas('programadores.cursos', function ($query) {
            $programador = Auth::user();
            $query->where('programador_curso_id',$programador->id );
        })->get();
        return view('programadorCursos.instructor_cursos', compact('cursosProgramador'));
    }

    public function evaluar_alumno(Request $request){
        $alumno = Usuario::findOrFail($request->alumno);
        $curso = Curso::findOrFail($request->curso);
        return view('programadorCursos.instructor_evaluarAlumno',compact('alumno', 'curso'));
    }

    public function guardar_evaluacion_alumno(Request $request){
        //dd($request);
        $alumno = Usuario::findOrFail($request->alumno);
        $curso = Curso::findOrFail($request->curso);
        //dd($alumno->cursos[0]->pivot->curso_id);
        //dd($alumno->cursos[0]->pivot->aprobado);
        if($request->aprobado == null){
            return redirect()->back();
        }
        //dd($alumno->cursos[0]->pivot, $alumno->cursos);
        /* $num = (int)$request->curso;
        $num = $num - 1; */
        //$alumno->cursos;
        //dd($curso->id);
        // dd($alumno->cursos);
        $alumno->cursos()->updateExistingPivot($curso->id,['aprobado'=>$request->aprobado]);
        //dd($alumno->cursos[0]->pivot->aprobado);
        return redirect()->intended(route('enviar-evaluacion-alumno',compact('curso')));
    }

    public function guardar_curso_concluido(Request $request){
        $curso = Curso::findOrFail($request->curso);
        $curso->estado = 'Concluido';
        $curso->save();
        return redirect('instructor-cursos');
    }

    public function enviar_evaluacion_alumno(Request $request){
        //$cursol = Curso::find($id);
        //dd($cursol->usuarios);
        $curso = Curso::find($request->curso);
        //dd($curso);
        return view('programadorCursos.instructor_enviarEvaluacionAlumno',compact('curso'));
    }

    // Responsable del curso
    public function crear_curso(){
        $programadores = ProgramadorCurso::all();
        return view('programadorCursos.responsable_crearCurso',compact('programadores'));
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
        $programador = ProgramadorCurso::findOrFail($request->programador);
        $curso->save();
        $curso->programadores()->attach($programador);
        //$curso->exclusivo = $request->exclusivo;
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
