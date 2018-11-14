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
        $cursos = Curso::all()->pluck('pk_curso')->toArray();
        $materias = Materia::select("pk_materia","nombre")->get();// @Modificacion Paola C.
        $empleados = Empleado::all()->pluck('cedula')->toArray();
        $curso = $faker->randomElement($cursos);
        $materia = $faker->randomElement($materias);
        $empleado = $faker->randomElement($empleados);
        #error_log(); //Muestra en consola cuando se ejecuta el "php artisan db:seed" // @Modificacion Paola C. 
        MateriaPC::create([
            'fk_materia' => $materia->pk_materia,// @Modificacion Paola C.
            'fk_empleado' => $empleado,
            'fk_curso' => $curso,
            'nombre' => $materia->nombre,// @Modificacion Paola C.
            'salon' => '101',
            'logros_custom' => 'logros 1',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        $curso2 = $faker->randomElement($cursos);
        $materia2 = $faker->randomElement($materias);
        $empleado2 = $faker->randomElement($empleados);
        
        MateriaPC::create([
            'fk_materia' => $materia2->pk_materia,// @Modificacion Paola C.
            'fk_empleado' => $empleado2,
            'fk_curso' => $curso2,
            'nombre' => $materia2->nombre,// @Modificacion Paola C.
            'salon' => '201',
            'logros_custom' => 'logros 2',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);
    }
}