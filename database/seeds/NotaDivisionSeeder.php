<?php
namespace database\seeds;

use Illuminate\Database\Seeder;
use App\Division;
use App\NotaDivision;
use database\seeds\NotaEstudianteSeeder;

class NotaDivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    }

    public static function create($fk_materia_pc,$fk_periodo,$fk_nota_periodo){
        $divs=Division::where("ano",date('Y'))->get();
        foreach ($divs as $d) {
            $n=NotaDivision::create([
                "fk_division"=>$d->pk_division,
                "fk_nota_periodo"=>$fk_nota_periodo
            ]);
            NotaEstudianteSeeder::create($fk_materia_pc,$fk_periodo,$d->pk_division,$n->pk_nota_division);
        }
    }
}
