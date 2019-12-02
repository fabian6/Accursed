<?php

use Illuminate\Database\Seeder;

class ModuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modulos')->insert([
            'nombre'                    => 'como basarte en un proyecto ya hecho, por carmona',
            'descripcion'                  => 'carmona te explica como copiar o basarte en un proyecto que ya esta hecho',
        ]);
    }
}
