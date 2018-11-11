<?php

use Illuminate\Database\Seeder;
use App\Materia;
use Faker\Factory as Faker;

class MateriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        Materia::create([
            'nombre' => 'Matemáticas',
            'contenido' => 'Algebra y trigonometria',
            'logros_custom' => 'Factorizar',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        Materia::create([
            'nombre' => 'Ingles',
            'contenido' => 'Past, present and future simple',
            'logros_custom' => 'Past perfect',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);
    }
}
