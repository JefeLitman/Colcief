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
      for ($i=1; $i <=4 ; $i++) {
        Division::create([
          'nombre' => 'Div_'.$i,
          'descripcion' => 'Corte'.$i,
          'porcentaje' => 25,
          'ano' => date('Y'),
          'created_at' => date('Y-m-d H:m:s'),
          'updated_at' => date('Y-m-d H:m:s')
        ]);
      }
      Division::reguard();      
    }
}
