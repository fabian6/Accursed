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
            'nombre'                    => 'jesus angel',
            'apellido'                  => 'carmona',
             'expediente'                  => 215284293,
            'email'                     => 'carmona@gmail.com',
            'password'                     => 'hehexd',
            'rol'                     => 'instructor',
            
            
        ]);
    }
}
