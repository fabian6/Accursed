<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    //
    protected $table='cursos';

    protected $fillable = [
        'nombre', 'cupo_disponible','descripcion','duracion',
        'fecha_inicio','fecha_final','horario','aula','estado','exclusivo'
    ];

    public $timestamps = false;

    public function usuarios(){
        return $this->belongsToMany('App\Usuario','cursos_usuarios');
    }

    public function programadores(){
        return $this->belongsToMany('App\ProgramadorCurso','cursos_programadores');
    }

    public function modulos(){
        return $this->hasMany('App\Modulo', 'curso_id');
    }
}
