<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //
    protected $table='usuarios';

    protected $fillable = [
        'nombre', 'apellido','email','password','provinencia','rol','expediente',
    ];

    public $timestamps = false;
    public function cursos(){
        return $this->belongsToMany('App\Curso','cursos_usuarios');
    }
}
