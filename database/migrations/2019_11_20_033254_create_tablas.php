<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Tabla usuarios 
         */
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('email');
            $table->string('password');
            $table->string('provinencia');
            $table->enum('rol', ['alumno', 'foraneo', 'director', 'consejo']);
            $table->boolean('admin')->default(false);
            // $table->string('escuela_origen');
            $table->integer('expediente')->nullable();
            $table->timestamps();
        });


        Schema::create('programadores_del_curso', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('expediente')->nullable();
            $table->string('email');
            $table->string('password');
            $table->enum('rol', ['instructor', 'responsable', 'ambos']);
            $table->timestamps();
        });

        Schema::create('cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('cupo_disponible');
            $table->longText('descripcion');
            $table->integer('duracion');
            $table->string('fecha_inicio');
            $table->string('fecha_final');
            $table->string('horario');
            $table->string('aula');
            $table->enum('estado', ['Aprobado', 'Concluido', 'Pendiente', 'Rechazado']);
            $table->boolean('exclusivo')->default(false);
            $table->timestamps();
        });

        /**
         * Tabla de los modulos del curso
         */
        Schema::create('modulos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->longText('descripcion');
            $table->integer('curso_id')->unsigned()->nullable();
            $table->timestamps();
        });

        /**
         * Se asigna a cursos_id de la tabla modulos como llave foranea de cursos.
         */
        Schema::table('modulos', function (Blueprint $table) {
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade')->onUpdate('cascade');
        });

        /**
         * Tabla pivote de cursos y usuarios
         */
        Schema::create('cursos_usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('curso_id')->nullable()->unsigned();
            $table->integer('usuario_id')->nullable()->unsigned();
            $table->enum('aprobado', ['Aprobado', 'Reprobado', 'Pendiente'])->default('Pendiente');
            $table->boolean('curso_evaluado')->default(0);
            $table->boolean('encargado_evaluado')->default(0);
        });

        /**
         * Se asigna a curso_id y usuario_id de la tabla cursos_usuarios como llaves foraneas
         */
        Schema::table('cursos_usuarios', function (Blueprint $table) {
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade')->onUpdate('cascade');
        });

        /**
         * Tabla pivote de cursos y programadores
         */
        Schema::create('cursos_programadores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('curso_id')->nullable()->unsigned();
            $table->integer('programador_curso_id')->nullable()->unsigned();
        });
        /**
         * Se asigna a curso_id y programador_id de la tabla cursos_programadores como llaves foraneas
         */
        Schema::table('cursos_programadores', function (Blueprint $table) {
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('programador_curso_id')->references('id')->on('programadores_del_curso')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programadores_del_curso');
        Schema::dropIfExists('cursos');
        Schema::dropIfExists('usuarios');
        Schema::dropIfExists('modulos');
        Schema::dropIfExists('cursos_usuarios');
        Schema::dropIfExists('cursos_programadores');
    }
}
