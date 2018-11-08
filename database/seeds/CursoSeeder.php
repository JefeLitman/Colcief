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
        for ($i=1; $i <12 ; $i++) {
          Curso::create([
            'prefijo' => $i,
            'sufijo' => '01',
            'ano' => '2018',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ]);
        }
    }
}
