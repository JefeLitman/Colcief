<?php

use Illuminate\Database\Seeder;
use App\Acudiente;
use Faker\Factory as Faker;

class AcudienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
        for ($i=0; $i < 5; $i++) {
          Acudiente::create([
            'nombre_acu_1' => $faker->name,
            'direccion_acu_1' => $faker->address,
            'telefono_acu_1' => '1234567890',
            'nombre_acu_2' => $faker->name,
            'direccion_acu_2' => $faker->address,
            'telefono_acu_2' => '0987654321',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ]);
        }
    }
}
