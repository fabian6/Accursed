<?php

namespace App\Http\Controllers;
use App\Curso;
use App\Usuario;
use Auth;
use Illuminate\Http\Request;

class ControladorCursos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::all();

        if(Auth::user()){
            /**
             * Query para obtener los cursos que no este inscrito el usuario actualmente autenticado, para asi
             * mandarlos a la vista de inicio y no pueda inscribirse dos veces al mismo curso
             */
            $cursosNoinscritos= Curso::whereDoesntHave('usuarios.cursos', function ($query) {
                $usuario= Auth::user();
                $query->where('usuario_id',$usuario->id );
            })->get();
            // dd($cursosNoinscritos);
            return view('welcome', compact('cursosNoinscritos'));
        }else{
            return view('welcome',compact('cursos'));
        }
       
    }

    /**
     * Funcion que se encarga de mostrar los cursos a evaluar.
     */
    public function cursosAevaluar(){
        $usuario= Auth::user();
        //forma de acceder a la tabla pivote
            // foreach ($usuario->cursos as $curso) {
            //     echo $curso->pivot->curso_evaluado;
            // }
        
        return view('cursos.verCursosAevaluar');
        
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
