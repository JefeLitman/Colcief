<?php
namespace database\seeds;

use Illuminate\Database\Seeder;
use App\Nota;
use App\NotaEstudiante;
use App\NotaDivision;

class NotaEstudianteSeeder extends Seeder
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

    public static function create($fk_materia_pc,$fk_periodo,$fk_division,$fk_nota_division){
        $notas=Nota::where([['fk_materia_pc',$fk_materia_pc],['fk_periodo',$fk_periodo],['fk_division',$fk_division]])->get();
        foreach ($notas as $n) {
            $notaE=NotaEstudiante::create([
                "fk_nota"=>$n->pk_nota,
                "fk_nota_division"=>$fk_nota_division,
                "nota"=>mt_rand(mt_rand(1,50),50)/10 //Lo hago asi para que la mayoria pase el año 
            ]);
        }
        NotaDivision::where("pk_nota_division",$fk_nota_division)->get()[0]->actualizarNota();        
    }

}
