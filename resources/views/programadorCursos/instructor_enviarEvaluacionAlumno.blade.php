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
                        <table class="table table-advance table-hover">
                            <thead >
                                <tr>
                                    <th class="text-center" style="color: black;"><i class=" fa fa-user"></i> Alumnos </th>
                                    <th class="text-center" style="color: black;"><i class=" fa fa-signal"></i> Estado </th>
                                    <th class="text-center" style="color: black;"><i class=" fa fa-edit"></i> Editar </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="color: black;">Alumno #1</td>
                                    <td class="text-center" style="color: black;"><span class="label label-success">Success</span></td>
                                    <td class="text-center" style="color: black;"> <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button> </td>
                                </tr>
                                <tr>
                                    <td style="color: black;">Alumno #2</td>
                                    <td class="text-center" style="color: black;"><span class="label label-warning">Warning</span></td>
                                    <td class="text-center" style="color: black;"> <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <button type="button" class="btn btn-round btn-success">Guardar</button>
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