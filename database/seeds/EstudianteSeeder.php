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
        $cursos = Curso::get();
        $usado = [];
        for ($i=0; $i < 5; $i++) {
          $acudiente = $faker->randomElement($acudientes);
          while (in_array($acudiente,$usado)) {
            $acudiente = $faker->randomElement($acudientes);
            //No es muy óptimo pero sirve.
          }
          $curso = $faker->randomElement($cursos);
          $grado = Curso::select('prefijo')->where('pk_curso','=',$curso->pk_curso)->get()->pluck('prefijo')->toArray()[0];
          Estudiante::create([
            'fk_acudiente' => $acudiente,
            'fk_curso' => $curso->pk_curso,
            'nombre' => $faker->firstName,
            'apellido' => $faker->lastName,
            'password' => Hash::make('clave'),
            'fecha_nacimiento' => $faker->date,
            'discapacidad' => 0,
            'estado' => 1
          ]);
          array_push($usado,$acudiente);
        }
    }
}
