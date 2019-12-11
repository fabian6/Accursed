<!DOCTYPE html>
@extends('layouts.app')
@section('content')
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-10 main-chart">
                    <!--CUSTOM CHART START -->
                    <div class="border-head">
                        <h3 style="color: black;"><i class="fa fa-angle-right"></i> <b>Curso : {{$curso->nombre}}</b> </h3>
                    </div>
                    <!--custom chart end-->
                    <div class="row mt">
                        <h4 style="color: black;">Lista de Alumnos</h4><hr>

                        <table class="table table-advance table-hover">
                            <thead >
                                <tr>
                                    <th class="text-center" style="color: black;"><i class=" fa fa-user"></i> Alumnos </th>
                                    <th class="text-center" style="color: black;"><i class=" fa fa-signal"></i> Estado </th>
                                    <th class="text-center" style="color: black;"><i class=" fa fa-edit"></i> Editar </th>
                                </tr>
                            </thead>
                            <tbody>
                                    @php
                                        //dd($curso->usuarios[0]->pivot);
                                    @endphp
                                @foreach ($curso->usuarios as $usuario)
                                    @if ($usuario->cursos[0]->pivot->aprobado == 'Aprobado' || $usuario->cursos[0]->pivot->aprobado == 'Pendiente')
                                        <tr>
                                            <td style="color: black;">{{$usuario->nombre}}</td>
                                            @if ($usuario->cursos[0]->pivot->aprobado == 'Aprobado')
                                                <td class="text-center" style="color: black;"><span class="label label-success">Aprobado</span></td>
                                            @endif
                                            @if ($usuario->cursos[0]->pivot->aprobado == 'Pendiente')
                                                <td class="text-center" style="color: black;"><span class="label label-warning">Pendiente</span></td>
                                            @endif

                                            <td class="text-center" style="color: black;">
                                                <form action="{{route('evaluar-alumno')}}" method="GET">
                                                    <input type="hidden" name="alumno" value="{{$usuario->id}}">
                                                    <input type="hidden" name="curso" value="{{$curso->id}}">
                                                    <button class="btn btn-primary btn-xs" type="submit"><i class="fa fa-pencil"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif    
                                    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @foreach ($curso->usuarios as $usuario)
                        @if ($usuario->cursos[0]->pivot->aprobado != 'Pendiente')
                            <div class="row">
                                <form action="{{ route('guardar_curso_concluido') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="curso" value="{{$curso->id}}">
                                    <button type="submit" class="btn btn-round btn-success">Guardar</button>
                                </form>
                            </div>
                            @break
                        @endif
                    @endforeach
                    
                </div>
            </div>
            <!-- /row -->
        </section>
    </section>
    <!--main content end-->
@endsection