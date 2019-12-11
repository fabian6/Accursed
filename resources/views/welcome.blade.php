<!DOCTYPE html>
@extends('layouts.app')
@section('content')

<section id="main-content">
    <section class="wrapper">
        <div class="row">
          <div class="container">
              <br><br><br>
              <h2>Cursos de actualización</h2>
              @auth
                @if ($cursosNoinscritos->count()>0 )
                
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
            
                    @foreach ($cursosNoinscritos as $cursoNoinscrito)
                      @if ($cursoNoinscrito->estado == 'Aprobado' && $cursoNoinscrito->estado != 'Concluido')
                        <tr>
                          <td>{{$cursoNoinscrito->nombre}}</td>
                          <td>{{$cursoNoinscrito->descripcion}}</td>
                          <td>{{$cursoNoinscrito->cupo_disponible}}</td>
                          <td>{{$cursoNoinscrito->aula}}</td>
                          <td>{{$cursoNoinscrito->horario}}</td>
                          <td>{{$cursoNoinscrito->duracion}}</td>
                          <td>{{$cursoNoinscrito->fecha_inicio}}</td>
                          {{-- <td>{{$curso->fecha_final}}</td> --}}
                
                          <td>
                            
                            <form action="{{route('inscribirCurso')}}" method="POST">
                                @csrf
                                
                                  <input type="hidden" value="{{auth()->user()->id}} " name="idUsuario">
                                  <input type="hidden" value="{{$cursoNoinscrito->id}}" name = "idCurso">
                                
                                
                                <button type="submit" class="btn btn-success btn-sm"
                                    onclick="return confirm('¿Deseas inscribirte a {{$cursoNoinscrito->nombre}}  ?')" >
                                    Inscribirse <span class="fa fa-pencil-square-o"></span>
                                </button>
                              
                              </form>
                            
                          </td>        
                            
                          </tr>
                      @endif
                      
                    @endforeach
                  @else
                      <p>No hay cursos de actualización disponibles</p>
                  @endif
                    
                  </tbody>
                </table>
              </div>
              @endauth
            
            @guest
              @if ($cursos->count()>0 )
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
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($cursos as $curso)
                    @if ($curso->estado == 'Aprobado' && $curso->estado != 'Concluido')
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
                              
                              <button type="submit" class="btn btn-success btn-sm" >
                                  Inscribirse <span class="fa fa-pencil-square-o"></span>
                              </button>
                            
                            </form>
                          
                        </td>        
                          
                        </tr>
                    @endif
                    
                  @endforeach
                @else
                    <p>No hay cursos de actualización disponibles</p>
                @endif
                    
                </tbody>
              </table>
            
            @endguest

        </div>
        <!-- /row -->
    </section>
</section>
  
@endsection

