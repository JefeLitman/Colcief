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
        /* EL ORDEN IMPORTA
          Como algunas tablas requieren foraneas, es necesario que, obviamente,
          el dato exista antes de ser asignado.
        */
        $this->call(AcudienteSeeder::class);
        $this->call(CursoSeeder::class);
        $this->call(EmpleadoSeeder::class);
        $this->call(EstudianteSeeder::class);
        $this->call(MateriaSeeder::class);
        $this->call(MateriaPCSeeder::class);
        $this->call(DivisionSeeder::class);
    }
}
