<?php

use Illuminate\Database\Seeder;
use App\Division;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
      Division::unguard();
      Division::create([
        'nombre' => 'Saber aprender',
        'descripcion' => 'Saber aprender',
        'porcentaje' => 40,
        'ano' => date('Y'),
        'created_at' => date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s')
      ]);
      Division::create([
        'nombre' => 'Saber hacer',
        'descripcion' => 'Saber hacer',
        'porcentaje' => 40,
        'ano' => date('Y'),
        'created_at' => date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s')
      ]);
      Division::create([
        'nombre' => 'Saber ser',
        'descripcion' => 'Saber ser',
        'porcentaje' => 20,
        'ano' => date('Y'),
        'created_at' => date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s')
      ]);
      Division::reguard();      
    }
}
