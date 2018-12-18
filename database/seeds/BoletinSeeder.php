<?php

use Illuminate\Database\Seeder;
use App\Estudiante;
use App\Boletin;

class BoletinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estudiantes=Estudiante::get();
        foreach ($estudiantes as $e) {
            Boletin::create([
                'fk_estudiante'=>$e->pk_estudiante,
                'fk_curso'=>$e->fk_curso,
                'ano'=>date('Y')
            ]);

        }
    }
}
