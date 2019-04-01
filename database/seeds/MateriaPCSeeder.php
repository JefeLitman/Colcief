<?php

use Illuminate\Database\Seeder;
use App\MateriaPC;
use App\Curso;
use App\Materia;
use App\Empleado;
use Faker\Factory as Faker;

class MateriaPCSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        // $cursos = Curso::all()->pluck('pk_curso')->toArray();
        $cursos = Curso::all();
        $materias = Materia::all();// @Modificacion Paola C.
        $empleados = Empleado::where([['role','1'],['role','2']])->get(); //Directores y Profesores

        
        #error_log(); //Muestra en consola cuando se ejecuta el "php artisan db:seed" // @Modificacion Paola C. 

        foreach ($cursos as $curso) {
            foreach ($materias as $materia) {
                //empleado random
                $empleado = $faker->randomElement($empleados);
                MateriaPC::create([
                    'fk_materia' => $materia->pk_materia,// @Modificacion Paola C.
                    'fk_empleado' => $empleado->cedula,
                    'fk_curso' => $curso->pk_curso,
                    'nombre' => $materia->nombre,// @Modificacion Paola C.
                    'salon' => '101',
                    'logros_custom' => 'logros 1'
                ]);
            }
        }

    }
}
