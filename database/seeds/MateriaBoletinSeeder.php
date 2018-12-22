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
        $total=count($boletines);
        error_log("  Creacion de tuplas: Materia Boletin, Nota Periodo, Nota Division, Nota estudiante.");
        error_log("    0 %");
        foreach ( $boletines as $key=>$b) {
            $materiaspc=MateriaPC::where('fk_curso',$b->fk_curso)->get();
            
            foreach ($materiaspc as $m) {
                $materia = MateriaBoletin::create([
                    'fk_materia_pc'=>$m->pk_materia_pc,
                    'fk_boletin'=>$b->pk_boletin
                ]);
                NotaPeriodoSeeder::create($m->pk_materia_pc,$materia->pk_materia_boletin);
            }
            error_log("    ".((($key+1)*100)/$total)." %"); //Muestra el porcentaje de creacion que lleva
        }
    }
}
