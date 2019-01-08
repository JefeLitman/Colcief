<?php

use Illuminate\Database\Seeder;
use App\Empleado;
use App\Curso;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class EmpleadoSeeder extends Seeder
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
      $curso = $faker->randomElement($cursos);
      Empleado::unguard();
      Empleado::create([
        'cedula' => 1,
        'nombre' => 'Douglas Sebastian',
        'apellido' => 'Gomez Caballero',
        'email' => 'pepis@gmail.com',
        'password' => Hash::make('clave'),
        'direccion' => 'Calle falsa #2',
        'titulo' => 'Ingeniero de alimentos',
        'fk_curso' => $curso,
        'role' => '1'
      ]); //El administrador base
      Empleado::create([
        'cedula' => 0,
        'nombre' => 'Administrador',
        'apellido' => 'Jdwep',
        'email' => 'Jdwep@gmail.com',
        'password' => Hash::make('clave'),
        'direccion' => 'Calle falsa #1',
        'titulo' => 'Ingeniero de sistemas',
        'role' => '0'
      ]); //El administrador base
      $faker = Faker::create();
      for ($i=0; $i <3 ; $i++) {
        Empleado::create([
          'cedula' => $faker->numberBetween(0,10000000),
          'nombre' => $faker->firstName,
          'apellido' => $faker->lastName,
          'email' => $faker->freeEmail,
          'password' => Hash::make('clave'),
          'direccion' => $faker->address,
          'titulo' => 'Profesor de algo',
          'role' => '2'
        ]);
      }
      Empleado::reguard();
    }
}
