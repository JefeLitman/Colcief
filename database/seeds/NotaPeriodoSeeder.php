<?php
namespace database\seeds;

use Illuminate\Database\Seeder;
use database\seeds\NotaDivisionSeeder;
use App\NotaPeriodo;
use App\Periodo;

class NotaPeriodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    }

    public static function create($fk_materia_pc,$fk_materia_boletin){
        $periodos = Periodo::where('ano',date('Y'))->get();
        foreach ($periodos as $p) {
            $n=NotaPeriodo::create([
                'fk_periodo'=>$p->pk_periodo,
                'fk_materia_boletin'=> $fk_materia_boletin,
                'habilidad'=>"ninguna"
            ]);
            NotaDivisionSeeder::create($fk_materia_pc,$p->pk_periodo,$n->pk_nota_periodo);
        }
    }
}
