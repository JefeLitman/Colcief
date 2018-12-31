<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    public function run(){
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
        $this->call(PeriodoSeeder::class);
        $this->call(NotaSeeder::class);
        $this->call(BoletinSeeder::class);
        $this->call(MateriaBoletinSeeder::class);
        $this->call(NotificacionSeeder::class);
        $this->call(FechaSeeder::class);
    }
}
