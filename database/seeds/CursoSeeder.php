<?php

use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cursos')->insert([
            'nombre'                    => 'hehexd',
            'descripcion'                  => 'giovanni',
            'cupo_disponible'                  => 20,
            'duracion'                     => 20,
            'fecha_inicio'                     => '10/10/2010',
            'fecha_final'                     => '10/10/2019',
            'horario'                     => '10:50 pm',
            'aula'                     => '3k4',
            'estado'                     => 'Pendiente',
            
        ]);
    }
}
