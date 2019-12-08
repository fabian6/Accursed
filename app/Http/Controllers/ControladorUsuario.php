<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Usuario;
use Auth;
class ControladorUsuario extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listaCursosInscrito()
    {
        $usuario= Auth::user();
        // dd($usuario->cursos);
        $cursos= $usuario->cursos;
        
        return view('alumnos.verCursosInscrito',compact('cursos'));
    }

    /**
     * Funcion que se encarga de mostrar el formulario para el curso ha evaluar
     */
    public function mostrarFormEvaluar(Request $request){
        $curso = Curso::findOrFail($request->idCurso);
        return view('cursos.evaluarCurso', compact('curso'));
    }
    /**
     * 
     */
    public function evaluarCurso(Request $request){
        $curso=Curso::findOrFail($request->idCurso);
        Auth::user()->cursos()->updateExistingPivot($curso->id,['curso_evaluado'=>1]);
        
        
        return redirect('tus-cursos');
    }
    /**
     * 
     */
    public function mostrarEvaluarEncargado(Request $request){
        $curso= Curso::findOrFail($request->idCurso);
        $programadores= $curso->programadores;
        return view('programadorCursos.evaluarEncargado',compact('programadores','curso'));
    }

    /**
     * 
     */
    public function evaluarEncargado(Request $request){
        $curso= Curso::findOrFail($request->idCurso);
        Auth::user()->cursos()->updateExistingPivot($curso->id,['encargado_evaluado'=>1]);

        return redirect('tus-cursos');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * Metodo que se encarga de relacionar a un usuario con un curso de actualizacion
     */
    public function inscribirCurso(Request $request){
        
        $usuario= Usuario::findOrFail(auth()->user()->id);
        $idCurso = $request->idCurso;
        $curso= Curso::findOrFail($idCurso);
        $usuario->cursos()->attach($curso);
        return redirect('tus-cursos');

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
