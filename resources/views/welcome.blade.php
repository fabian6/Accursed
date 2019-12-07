<!DOCTYPE html>
@extends('layouts.app')
@section('content')
<div class="container">
  <br><br><br>
  <h2>Cursos de actualización</h2>
  @auth
    @if ($cursosNoinscritos->count()>0)
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

        @foreach ($cursosNoinscritos as $cursoNoinscritos)
          <tr>
          <td>{{$cursoNoinscritos->nombre}}</td>
          <td>{{$cursoNoinscritos->descripcion}}</td>
          <td>{{$cursoNoinscritos->cupo_disponible}}</td>
          <td>{{$cursoNoinscritos->aula}}</td>
          <td>{{$cursoNoinscritos->horario}}</td>
          <td>{{$cursoNoinscritos->duracion}}</td>
          <td>{{$cursoNoinscritos->fecha_inicio}}</td>
          {{-- <td>{{$curso->fecha_final}}</td> --}}

                  <td>
                    
                  <form action="{{route('inscribirCurso')}}" method="POST">
                      @csrf
                      
                        <input type="hidden" value="{{auth()->user()->id}} " name="idUsuario">
                        <input type="hidden" value="{{$cursoNoinscritos->id}}" name = "idCurso">
                      
                      
                      <button type="submit" class="btn btn-success btn-sm"
                          onclick="return confirm('¿Deseas inscribirte a {{$cursoNoinscritos->nombre}}  ?')" >
                          Inscribirse <span class="fa fa-pencil-square-o"></span>
                      </button>
                    
                    </form>
                    
                  </td>        
            
          </tr>
        @endforeach
      @else
          <p>No hay cursos de actualización disponibles</p>
      @endif
        
      </tbody>
    </table>
  </div>
  @endauth

@guest
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
            
            <form action="{{route('inscribirCurso')}}" method="POST">
              @csrf
              @auth
                <input type="hidden" value="{{auth()->user()->id}} " name="idUsuario">
                <input type="hidden" value="{{$curso->id}}" name = "idCurso">
              @endauth
              
              <button type="submit" class="btn btn-success btn-sm" >
                  Inscribirse <span class="fa fa-pencil-square-o"></span>
              </button>
            </form>
          </td>
          
          </tr>
        @endforeach
    @else
        <p>No hay cursos de actualización disponibles</p>
    @endif
        
    </tbody>
  </table>

@endguest
  
@endsection