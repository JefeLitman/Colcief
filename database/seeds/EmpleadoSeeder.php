<?php

use Illuminate\Database\Seeder;
use App\Empleado;
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
      Empleado::create([
        'cedula' => 1234567890,
        'nombre' => 'Administrador',
        'apellido' => 'Jdwep',
        'correo' => 'Jdwep@gmail.com',
        'password' => Hash::make('clave'),
        'direccion' => 'Calle falsa #1',
        'titulo' => 'Ingeniero de sistemas',
        'role' => '0',
        'created_at' => date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s')
      ]); //El administrador base
      $faker = Faker::create();
      for ($i=0; $i <3 ; $i++) {
        Empleado::create([
          'cedula' => $faker->numberBetween(0,10000000),
          'nombre' => $faker->firstName,
          'apellido' => $faker->lastName,
          'correo' => $faker->freeEmail,
          'password' => Hash::make('clave'),
          'direccion' => $faker->address,
          'titulo' => 'Profesor de algo',
          'role' => '1',
          'created_at' => date('Y-m-d H:m:s'),
          'updated_at' => date('Y-m-d H:m:s')
        ]);
      }
    }
}
