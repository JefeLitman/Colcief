<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Acudiente;
use App\Estudiante;
use App\Curso;
use Illuminate\Support\Facades\Hash;

class EstudianteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $acudientes = Acudiente::all()->pluck('pk_acudiente')->toArray();
        $cursos = Curso::all()->pluck('pk_curso')->toArray();
        $usado = [];
        for ($i=0; $i < 5; $i++) {
          $acudiente = $faker->randomElement($acudientes);
          while (in_array($acudiente,$usado)) {
            $acudiente = $faker->randomElement($acudientes);
            //No es muy óptimo pero sirve.
          }
          $curso = $faker->randomElement($cursos);
          $grado = Curso::select('prefijo')->where('pk_curso','=',$curso)->get()->pluck('prefijo')->toArray()[0];
          Estudiante::create([
            'fk_acudiente' => $acudiente,
            'fk_curso' => $curso,
            'nombre' => $faker->firstName,
            'apellido' => $faker->lastName,
            'password' => Hash::make('clave'),
            'fecha_nacimiento' => $faker->date,
            'grado' => $grado,
            'discapacidad' => 0,
            'estado' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ]);
          array_push($usado,$acudiente);
        }
    }
}
