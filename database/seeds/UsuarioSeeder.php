<?php

use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'nombre'                    => 'Admin',
            'apellido'                  => 'Admin',
            'email'                  => 'carmona@gmail.com',
            'password'                     => 'carmona',
            'provinencia'                     => 'hermosillo',
            'rol'                     => 'alumno',
            
        ]);
    }
}
