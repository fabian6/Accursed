<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsuarioSeeder::class);
        $this->call(CursoSeeder::class);
        $this->call(ModuloSeeder::class);
        $this->call(ProgramadorSeeder::class);
    }
}
