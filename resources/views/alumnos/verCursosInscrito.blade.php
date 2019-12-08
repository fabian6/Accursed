<!DOCTYPE html>
@extends('layouts.app')
@section('content')
<div class="container">
  <br><br><br>
  <h2>Cursos inscrito</h2>
  {{-- @php
      dd($cursos);
  @endphp        --}}
  @if ($cursos->count()>0)
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Nombre del curso</th>
        <th>Descripción</th>
        <th>Cupo disponible</th>
        <th>Aula</th>
        <th>Horario</th>
        <th>Duración</th>
        <th>Fecha de inicio</th>
        <th></th>
        <th></th>
        {{-- <th>Fecha a concluir</th> --}}
        
      </tr>
    </thead>
    
    <tbody>
      @foreach ($cursos as $curso)
      
        <tr>
        <td>{{$curso->nombre}}</td>
        <td>{{$curso->descripcion}}</td>
        <td>{{$curso->cupo_disponible}}</td>
        <td>{{$curso->aula}}</td>
        <td>{{$curso->horario}}</td>
        <td>{{$curso->duracion}}</td>
        <td>{{$curso->fecha_inicio}}</td>
        <td>
          @if ($curso->estado == 'Concluido'  )
            @if($curso->pivot->curso_evaluado=='0')
              <form action="{{route('mostrarFormEvaluar')}}" method="GET">
                  <button type="submit" class="btn btn-success btn-sm"  >
                      <input type="hidden" value={{$curso->id}} name='idCurso'>
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
        <p>No te haz inscrito a ningún cursos de actualización</p>
    @endif
      
    </tbody>
  </table>
</div>
@endsection