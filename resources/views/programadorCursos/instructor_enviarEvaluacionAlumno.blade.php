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
                        <h3 style="color: black;"><i class="fa fa-angle-right"></i> <b>Curso : {Inserte nombre de curso aqui}</b> </h3>
                    </div>
                    <!--custom chart end-->
                    <div class="row mt">
                        <h4 style="color: black;">Lista de Alumnos</h4><hr>
                        @if ($cursosProgramador->count() > 0)
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
                                        <tr>
                                            <td style="color: black;">{{$usuario->nombre}}</td>
                                            @if ($usuario->cursos[0]->pivot->aprobado == 'Aprobado')
                                                <td class="text-center" style="color: black;"><span class="label label-success">Aprobado</span></td>
                                            @endif
                                            @if ($usuario->cursos[0]->pivot->aprobado == 'Pendiente')
                                                <td class="text-center" style="color: black;"><span class="label label-warning">Pendiente</span></td>
                                            @endif
                                            <td class="text-center" style="color: black;"><a class="btn btn-primary btn-xs" href="#" type="submit"><i class="fa fa-pencil"></i></a></td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>Cursos sin Asignar</p>
                        @endif
                    </div>
{{--                     <div class="row">
                        <button type="button" class="btn btn-round btn-success">Guardar</button>
                    </div> --}}

                </div>
                <!-- /col-lg-9 END SECTION MIDDLE -->
                <!-- **********************************************************************************************************************************************************
                    RIGHT SIDEBAR CONTENT
                    *********************************************************************************************************************************************************** -->
                <!--<div class="col-lg-3 ds">

                </div>-->
                <!-- /col-lg-3 -->
            </div>
            <!-- /row -->
        </section>
    </section>
    <!--main content end-->
@endsection