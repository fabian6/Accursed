<!DOCTYPE html>
@extends('layouts.app')
@section('content')
<div class="container">
    <form onsubmit="enviar()" action="{{route('evaluarEncargado')}}" method ="POST">
        
        @foreach ($programadores as $programador)
            
            @if ($programador->rol == 'instructor' || $programador->rol=='ambos')
                <br><br><br><br><br><br>
        
                <h1>Encargado del curso:{{$programador->nombre}} {{$programador->apellido}} </h1>
                
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">¿El encargado finalizó el curso de actualización?</label>
                        <div class="radio">
                            <label><input type="radio" name="optradio{{$programador->id}}" checked>Si</label>
                                </div>
                                <div class="radio">
                                <label><input type="radio" name="optradio{{$programador->id}}">No</label>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="exampleInputEmail1">¿El encargado cumplió con  el contenido del curso?</label>
                        <div class="radio">
                                <label><input type="radio" name="optradio2{{$programador->id+1}}" checked>Si</label>
                                </div>
                                <div class="radio">
                                <label><input type="radio" name="optradio2{{$programador->id+1}}">No</label>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="exampleInputEmail1">¿El encargado fue claro con el contenido impartido?</label>
                        <div class="radio">
                                <label><input type="radio" name="optradio3{{$programador->id+2}}" checked>Si</label>
                                </div>
                                <div class="radio">
                                <label><input type="radio" name="optradio3{{$programador->id+2}}">No</label>
                        </div>
                    </div>
            @endif
            
        @endforeach
        <input type="hidden"  name='idCurso' value={{$curso->id}}>
        <button type="submit" value="Submit" class="btn btn-primary">Evaluar</button>
    <br><br><br><br><br>
    </form>
</div>

<script>
    function enviar() {
        alert("¡Evaluación registrada exitosamente!");
    }
</script>
@endsection