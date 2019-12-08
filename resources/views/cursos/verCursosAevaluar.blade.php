<!DOCTYPE html>
@extends('layouts.app')
@section('content')
<div class="container">
  <br><br><br>
  <h2>Cursos inscrito</h2>
  {{-- @php
      dd($cursos);
  @endphp        --}}
  @if (auth()->user()->cursos->count()>0)
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Nombre del curso</th>
        <th>Descripción</th>
        <th>Cupo disponible</th>
        <th>Aula</th>
        <th>Horario</th>
        <th>duración</th>
        <th>Fecha de inicio</th>
        {{-- <th>Fecha a concluir</th> --}}
        <th></th>
      </tr>
    </thead>
    
    <tbody>
      @foreach (auth()->user()->cursos as $cursoSinEvaluar)
        
        <tr>
        <td>{{$cursoSinEvaluar->nombre}}</td>
        <td>{{$cursoSinEvaluar->descripcion}}</td>
        <td>{{$cursoSinEvaluar->cupo_disponible}}</td>
        <td>{{$cursoSinEvaluar->aula}}</td>
        <td>{{$cursoSinEvaluar->horario}}</td>
        <td>{{$cursoSinEvaluar->duracion}}</td>
        <td>{{$cursoSinEvaluar->fecha_inicio}}</td>
        
        <td>
        @if ($cursoSinEvaluar->estado == 'Concluido'  )
          @if($cursoSinEvaluar->pivot->curso_evaluado=='0')
            <form action="{{route('mostrarFormEvaluar')}}" method="GET">
                <button type="submit" class="btn btn-success btn-sm"  >
                    <input type="hidden" value={{$cursoSinEvaluar->id}} name='idCurso'>
                    Evaluar curso de actualización <span class=""></span>
                  </button>
            </form>
            @else
                <p>Curso evaluado</p>
          @endif
            
        @else
            <p>El curso no ha concluido.</p>        
        
        @endif
      </td>
        
        
         
        </tr>
      @endforeach
    @else
        <p>No hay cursos de actualización ha evaluar.</p>
    @endif
      
    </tbody>
  </table>
</div>
@endsection