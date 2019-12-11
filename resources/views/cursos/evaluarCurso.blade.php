<!DOCTYPE html>
@extends('layouts.app')
@section('content')
<section id="main-content">
    <section class="wrapper">
      <div class="row">
        <br><br>
    <div class="container">
        <h1>Curso de actualización: {{$curso->nombre}}</h1>
        <form onsubmit="enviar()" action="{{route('evaluarCurso')}}" method ="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">¿El contenido del curso fue satisfactorio?</label>
                <div class="radio">
                        <label><input type="radio" name="optradio" checked>Si</label>
                      </div>
                      <div class="radio">
                        <label><input type="radio" name="optradio">No</label>
                </div>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">¿El curso cumplio con el objetivo del programa?</label>
                <div class="radio">
                        <label><input type="radio" name="optradio2" checked>Si</label>
                      </div>
                      <div class="radio">
                        <label><input type="radio" name="optradio2">No</label>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Observaciones</label>
                <div class="form-group">
                    <label for="comment">Escribe tus comentarios:</label>
                    <textarea class="form-control" rows="5" id="comment" required></textarea>
                </div>
            </div>
            <input type="hidden" value={{$curso->id}} name='idCurso'>
            <button type="submit" value="Submit" class="btn btn-primary">Evaluar</button>
        </form>
    </div>
      </div>
      <!-- /row -->
    </section>
  </section>
<script>
    function enviar() {
        alert("¡Evaluación registrada exitosamente!");
    }
</script>
@endsection
