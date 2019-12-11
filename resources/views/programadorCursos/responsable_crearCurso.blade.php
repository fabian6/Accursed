@extends('layouts.app')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-10 main-chart">
                    <!--CUSTOM CHART START -->
                    <div class="border-head">
                    </div>
                    <!--custom chart end-->
                    <div class="row mt">
                        <h4 style="color: black;">Crear propuesta de curso</h4><hr>
                        <form method="POST" action="{{ route('crearcurso') }}">
                            @csrf

                            <!-- Nombre del curso -->
                            <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del curso') }}</label>

                                <div class="col-md-6">
                                    <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>

                                    @error('nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Duracion y Cupo -->
                            <div class="form-group row">
                                <label for="cupo_disponible" class="col-md-4 col-form-label text-md-right">{{ __('Cupo disponible') }}</label>

                                <div class="col-md-6">
                                    <input id="cupo_disponible" type="text" class="form-control @error('cupo_disponible') is-invalid @enderror" name="cupo_disponible" value="{{ old('cupo_disponible') }}" required autocomplete="cupo_disponible" autofocus>

                                    @error('cupo_disponible')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                            </div>

                            <div class="form-group row">
                                <label for="duracion" class="col-md-4 col-form-label text-md-right">{{ __('Duracion del curso') }}</label>

                                <div class="col-md-6">
                                    <input id="duracion" type="text" class="form-control @error('duracion') is-invalid @enderror" name="duracion" value="{{ old('duracion') }}" required autocomplete="duracion" autofocus>

                                    @error('apellido')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Descripcion -->
                            <div class="form-group row">
                                <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion del curso') }}</label>

                                <div class="col-md-6">
                                    <input  type="textarea" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="{{ old('descripcion') }}" required autocomplete="descripcion">

                                    @error('descripcion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Fecha inicio y final -->
                            <div class="form-group row">
                                <label for="fecha_inicio" class="col-md-4 col-form-label text-md-right">{{ __('Fecha inicio (DD/MM/YY)') }}</label>

                                <div class="col-md-6">
                                    <input id="fecha_inicio" type="text" class="form-control @error('fecha_inicio') is-invalid @enderror" name="fecha_inicio" required >

                                    @error('fecha_inicio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <label for="fecha_final" class="col-md-4 col-form-label text-md-right">{{ __('Fecha final (DD/MM/YY)') }}</label>

                                <div class="col-md-6">
                                    <input id="fecha_final" type="text" class="form-control @error('fecha_final') is-invalid @enderror" name="fecha_final" required >

                                    @error('fecha_final')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Horario -->
                            <div class="form-group row">
                                <label for="horario" class="col-md-4 col-form-label text-md-right">{{ __('Horario') }}</label>

                                <div class="col-md-6">
                                    <input id="horario" type="text" class="form-control @error('horario') is-invalid @enderror" name="horario" required >

                                    @error('horario')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Aula -->
                            <div class="form-group row">
                                <label for="aula" class="col-md-4 col-form-label text-md-right">{{ __('Aula (opcional)') }}</label>

                                <div class="col-md-6">
                                    <input  type="text" class="form-control" name="aula"  >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="programador" class="col-md-4 col-form-label text-md-right">{{ __('Intructor') }}</label>


                                <select name="programador" id="">
                                    @foreach ($programadores as $programador)
                                        <option value={{ $programador->id }}>{{ $programador->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Crear Curso') }}
                                    </button>
                                </div>
                            </div>
                        </form>
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
@endsection
