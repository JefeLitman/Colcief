<?php

use Illuminate\Database\Seeder;
use App\Empleado;
use App\Curso;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class EmpleadoSeeder extends Seeder {

    public function run()
    {
       //El administrador base
      Empleado::create([
        'cedula' => 0,
        'nombre' => 'Administrador',
        'apellido' => 'Jdwep',
        'email' => 'Jdwep@gmail.com',
        'password' => Hash::make('clave'),
        'direccion' => 'Calle falsa #1',
        'titulo' => 'Ingeniero de sistemas',
        'role' => '0'
      ]);
      Empleado::create([
        'cedula' => 1,
        'nombre' => 'Director',
        'apellido' => 'Jdwep',
        'email' => 'Jdwep@gmail.com',
        'password' => Hash::make('clave'),
        'direccion' => 'Calle falsa #1',
        'titulo' => 'Ingeniero de sistemas',
        'role' => '1'
      ]);
      Empleado::create([
        'cedula' => 2,
        'nombre' => 'Profesor',
        'apellido' => 'Jdwep',
        'email' => 'Jdwep@gmail.com',
        'password' => Hash::make('clave'),
        'direccion' => 'Calle falsa #1',
        'titulo' => 'Ingeniero de sistemas',
        'role' => '2'
      ]);
      Empleado::create([
        'cedula' => 3,
        'nombre' => 'Coordinador',
        'apellido' => 'Jdwep',
        'email' => 'Jdwep@gmail.com',
        'password' => Hash::make('clave'),
        'direccion' => 'Calle falsa #1',
        'titulo' => 'Ingeniero de sistemas',
        'role' => '3'
      ]);
    }
}
