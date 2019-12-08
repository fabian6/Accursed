<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ProgramadorCurso extends Authenticatable
{
    protected $table='programadores_del_curso';
    protected $fillable = [
        'nombre', 'apellido','expediente','email','password','rol',
    ];

    public $timestamps = false;

    public function cursos(){
        return $this->belongsToMany('App\Curso','cursos_programadores')->withPivot(['rol']);
    }
}
