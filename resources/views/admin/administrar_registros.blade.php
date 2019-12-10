@extends('layouts.app')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-10 main-chart">
                    <!--CUSTOM CHART START -->
                    <div class="border-head">
                        <h3 style="color: black;"><i class="fa fa-angle-right"></i> <b>Administracion de Cuentas</b> </h3>
                    </div>
                    <!--custom chart end-->
                    <div class="row mt">
                        <h4 style="color: black;">Programador de Cursos</h4><hr>
                        <form method="POST" action="{{ route('administrarRegistros') }}">
                            @csrf
                    
                            <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                    
                                <div class="col-md-6">
                                    <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>
                    
                                    @error('nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                    
                            <div class="form-group row">
                                <label for="apellido" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>
                    
                                <div class="col-md-6">
                                    <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" value="{{ old('apellido') }}" required autocomplete="apellido" autofocus>
                    
                                    @error('apellido')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                    
                            <div class="form-group row">
                                <label for="correo" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>
                    
                                <div class="col-md-6">
                                    <input  type="email" class="form-control @error('correo') is-invalid @enderror" name="email" value="{{ old('correo') }}" required autocomplete="correo">
                    
                                    @error('correo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                    
                            <div class="form-group row">
                                <label for="rol" class="col-md-4 col-form-label text-md-right">{{ __('Rol para el usuario') }}</label>
                    
                                <div class="col-md-6">
                                    <select class="form-control" name="rol">
                                        <option value="responsable">Responsable</option> 
                                        <option value="instructor">Instructor</option>
                                    </select>
                                </div>
                            </div>
                    
                            <div class="form-group row">
                                <label for="contraseña" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
                    
                                <div class="col-md-6">
                                    <input id="contraseña" type="password" class="form-control @error('contraseña') is-invalid @enderror" name="password" required >
                    
                                    @error('contraseña')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                    
                            <div class="form-group row">
                                <label for="expediente" class="col-md-4 col-form-label text-md-right">{{ __('Expediente (opcional)') }}</label>
                    
                                <div class="col-md-6">
                                    <input  type="text" class="form-control" name="expediente"  >
                                </div>
                            </div>
                    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /row -->
            <div class="row">
                <div class="col-lg-10 main-chart">
                    <div class="row mt">
                        <h4 style="color: black;">Director de Division y Consejo Divisional</h4><hr>
                        <form method="POST" action="{{ route('administrarRegistrosDD') }}">
                            @csrf
                    
                            <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                    
                                <div class="col-md-6">
                                    <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>
                    
                                    @error('nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                    
                            <div class="form-group row">
                                <label for="apellido" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>
                    
                                <div class="col-md-6">
                                    <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" value="{{ old('apellido') }}" required autocomplete="apellido" autofocus>
                    
                                    @error('apellido')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                    
                            <div class="form-group row">
                                <label for="correo" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>
                    
                                <div class="col-md-6">
                                    <input  type="email" class="form-control @error('correo') is-invalid @enderror" name="email" value="{{ old('correo') }}" required autocomplete="correo">
                    
                                    @error('correo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                    
                            <div class="form-group row">
                                <label for="rol" class="col-md-4 col-form-label text-md-right">{{ __('Rol para el usuario') }}</label>
                    
                                <div class="col-md-6">
                                    <select class="form-control" name="rol">
                                        <option value="consejo">Consejo Divisional</option> 
                                        <option value="director">Director Divisional</option>
                                    </select>
                                </div>
                            </div>
                    
                            <div class="form-group row">
                                <label for="contraseña" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
                    
                                <div class="col-md-6">
                                    <input id="contraseña" type="password" class="form-control @error('contraseña') is-invalid @enderror" name="password" required >
                    
                                    @error('contraseña')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
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
        </section>
    </section>
@endsection
