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
            'nombre'                    => 'Ingenieria de software',
            'descripcion'                  => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'",
            'cupo_disponible'                  => 20,
            'duracion'                     => 20,
            'fecha_inicio'                     => '10/10/2010',
            'fecha_final'                     => '10/10/2019',
            'horario'                     => '10:50 pm',
            'aula'                     => '3k4',
            'estado'                     => 'Aprobado',
            
        ]);
        DB::table('cursos')->insert([
            'nombre'                    => 'Graficación por computadora',
            'descripcion'                  => 'giovanni',
            'cupo_disponible'                  => 20,
            'duracion'                     => 20,
            'fecha_inicio'                     => '10/10/2010',
            'fecha_final'                     => '10/10/2019',
            'horario'                     => '10:50 pm',
            'aula'                     => '3k4',
            'estado'                     => 'Pendiente',
            
        ]);
        DB::table('cursos')->insert([
            'nombre'                    => 'Inteligencia artificial',
            'descripcion'                  => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.',
            'cupo_disponible'                  => 20,
            'duracion'                     => 20,
            'fecha_inicio'                     => '10/10/2010',
            'fecha_final'                     => '10/10/2019',
            'horario'                     => '10:50 pm',
            'aula'                     => '3k4',
            'estado'                     => 'Concluido',
            
        ]);
    }
}
