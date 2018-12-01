<?php

use Illuminate\Database\Seeder;
use App\Boletin;
use App\MateriaBoletin;
use App\MateriaPC;
use database\seeds\NotaPeriodoSeeder;

class MateriaBoletinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $boletines=Boletin::get();
        foreach ( $boletines as $b) {
            $materiaspc=MateriaPC::where('fk_curso',$b->fk_curso)->get();
            foreach ($materiaspc as $m) {
                $materia = MateriaBoletin::create([
                    'fk_materia_pc'=>$m->pk_materia_pc,
                    'fk_boletin'=>$b->pk_boletin
                ]);
                NotaPeriodoSeeder::create($materia->pk_materia_boletin);
            }
        }
    }
}
