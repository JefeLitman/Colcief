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
    }
}
