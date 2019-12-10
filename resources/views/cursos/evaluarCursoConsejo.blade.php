<!DOCTYPE html>
@extends('layouts.app')
@section('content')
<div class="container">
  <br><br><br>
  <h2>Cursos pendientes</h2>
  {{-- @php
      dd($cursos_pendientes);
  @endphp        --}}
  @if ($cursos_pendientes->count()>0)
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
        {{-- <th>Fecha a concluir</th> --}}
        <th>Evaluar curso</th>
        
      </tr>
    </thead>
    
    <tbody>
      @foreach ($cursos_pendientes as $curso)
      
        <tr>
        <td>{{$curso->nombre}}</td>
        <td>{{$curso->descripcion}}</td>
        <td>{{$curso->cupo_disponible}}</td>
        <td>{{$curso->aula}}</td>
        <td>{{$curso->horario}}</td>
        <td>{{$curso->duracion}}</td>
        <td>{{$curso->fecha_inicio}}</td>
        <td>
                
            <form action="{{route('guardarEvaluacionConsejo')}}" method="POST">
                @csrf
                
                    <input type="hidden" value="{{auth()->user()->id}} " name="idUsuario">
                    <input type="hidden" value="{{$curso->id}}" name = "idCurso">
                
                
                <button type="submit" class="btn btn-success btn-sm"
                    onclick="return confirm('¿Deseas aprobar el curso {{$curso->nombre}}  ?')" name="Evaluar" value="Aprobado">
                    Aprobar <span class="fa fa-check-square"></span>
                </button>
                <button type="submit" class="btn btn-danger btn-sm"
                    onclick="return confirm('¿Deseas rechazar el curso {{$curso->nombre}}  ?')" name="Evaluar" value="Rechazado">
                    Rechazar <span class="fa fa-times" name ="Evaluar" value="Rechazado"></span>
                </button>
                
            </form>
        </td>  
        </tr>
       
      @endforeach

    @else
        <p>No hay cursos pendientes por aprobar por el momento</p>
    @endif
      
    </tbody>
  </table>
</div>
@endsection