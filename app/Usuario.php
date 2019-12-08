<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario  extends Authenticatable
{
    //
    protected $table='usuarios';

    protected $fillable = [
        'nombre', 'apellido','email','password','provinencia','rol','expediente',
    ];

    public $timestamps = false;
    /**
     * Funcion que relaciona muchos a muchos a la tabla usuarios con la tabla cursos
     * Al agregar un nuevo atributo a la tabla pivote, es necesario relacionarlo con la funcion 'withPivot(['atributo deseado'])'
     * 
     */
    public function cursos(){
        return $this->belongsToMany('App\Curso','cursos_usuarios')->withPivot(['aprobado','curso_evaluado','encargado_evaluado']);
    }
}
