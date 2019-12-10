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
                        <h3 style="color: black;"><i class="fa fa-angle-right"></i> <b>Mis cursos Programados</b> </h3>
                    </div>
                    <!--custom chart end-->
                    <div class="row mt">
                        <h4 style="color: black;">Lista de Cursos</h4><hr>
                        @if ($cursosProgramador->count() > 0)
                            <table class="table table-advance table-hover">
                                <thead >
                                    <tr>
                                        <th class="text-center" style="color: black;"><i class=" fa fa-book"></i> Curso </th>
                                        <th class="text-center" style="color: black;"><i class=" fa fa-signal"></i> Cupo Disponible </th>
                                        <th class="text-center" style="color: black;"><i class=" fa fa-edit"></i> Horario </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cursosProgramador as $curso)
                                        <tr>
                                            <td style="color: black;">{{$curso->nombre}}</td>
                                            <td class="text-center" style="color: black;">{{$curso->cupo_disponible}}</td>
                                            <td class="text-center" style="color: black;">{{$curso->horario}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>Cursos sin Asignar</p>
                        @endif
                    </div>
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