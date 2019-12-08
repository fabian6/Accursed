<?php

use Illuminate\Database\Seeder;

class ProgramadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('programadores_del_curso')->insert([
            'nombre'                    => 'Alberto',
            'apellido'                  => 'Mireles',
             'expediente'                  => 215284293,
            'email'                     => 'mireles@gmail.com',
            'password'                     => 'hehexd',
            // 'rol'                     => 'instructor',
            
            
        ]);
        DB::table('programadores_del_curso')->insert([
            'nombre'                    => 'Roberto',
            'apellido'                  => 'Nuñez',
             'expediente'                  => 215284293,
            'email'                     => 'roberto@gmail.com',
            'password'                     => 'hehexd',
            // 'rol'                     => 'instructor',
            
            
        ]);
        DB::table('programadores_del_curso')->insert([
            'nombre'                    => 'Julio',
            'apellido'                  => 'Waissman',
             'expediente'                  => 215284293,
            'email'                     => 'waissman@gmail.com',
            'password'                     => 'hehexd',
            // 'rol'                     => 'instructor',
            
            
        ]);
    }
}
