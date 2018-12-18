<?php

use Illuminate\Database\Seeder;
use App\Curso;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i <12 ; $i++) {
          Curso::create([
            'prefijo' => $i,
            'sufijo' => '01',
            'ano' => '2018'
          ]);
        }
    }
}
