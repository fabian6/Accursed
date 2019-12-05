<!DOCTYPE html>
@extends('layouts.app')
@section('content')
<div class="container">
  <br><br><br>
  <h2>Cursos de actualización</h2>
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
        <th>duración</th>
        <th>Fecha de inicio</th>
        {{-- <th>Fecha a concluir</th> --}}
        <th></th>
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
        {{-- <td>{{$curso->fecha_final}}</td> --}}
        <td>
          {{-- <form action="{{route()}}" method="POST"> --}}
              <button type="submit" class="btn btn-success btn-sm"
                  onclick="return confirm('todavia no esta listo este boton, brga')" >
                  Inscribirse <span class="fa fa-pencil-square-o"></span>
              </button></td>
          {{-- </form> --}}
         
        </tr>
      @endforeach
    @else
        <p>No hay cursos de actualización disponibles</p>
    @endif
      
    </tbody>
  </table>
</div>
@endsection