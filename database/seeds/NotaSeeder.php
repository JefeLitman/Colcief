<?php

use Illuminate\Database\Seeder;
use App\MateriaPC;
use App\Periodo;
use App\Division;
use App\Nota;

class NotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $materias = MateriaPC::get();
        $periodos = Periodo::where("ano",date("Y"))->get();
        $divs = Division::where("ano",date("Y"))->get();
        $total = count($materias);
        error_log("  0 %");
        foreach ($materias as $key=>$m) {
            $cont=0;
            foreach ($periodos as $p) {
                foreach ($divs as $d) {
                    for ($i=1 ; $i<3  ; $i++) { 
                        //Antes hacia 4 de 25% cada una pero por la demora que tomaba pues decidi bajarlo a 2,
                        //Aun asi dejo el for por si alguien quiere que sean de mas notas by: @Paola :v
                        $cont++;
                        Nota::create([
                            "fk_materia_pc"=>$m->pk_materia_pc,
                            "fk_periodo"=>$p->pk_periodo,
                            "fk_division"=>$d->pk_division,
                            "nombre"=>"Nota_".$cont,
                            "descripcion"=>"Descripcion Nro ".$cont,
                            "porcentaje"=>50
                        ]); 
                    }
                }
            }
            error_log("  ".((($key+1)*100)/$total)." %");
        }
    }
}
