<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    
    protected $table='modulos';
    protected $fillable = [
        'nombre', 'descripcion',
    ];
    public $timestamps = false;
    public function curso(){
        return $this->belongsTo('App\Curso');
    }
}
