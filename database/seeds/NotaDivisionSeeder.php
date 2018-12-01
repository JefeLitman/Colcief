<?php
namespace database\seeds;

use Illuminate\Database\Seeder;
use App\Division;
use App\NotaDivision;

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

    public static function create($fk_nota_periodo){
        $divs=Division::where("ano",date('Y'))->get();
        foreach ($divs as $d) {
            NotaDivision::create([
                "fk_division"=>$d->pk_division,
                "fk_nota_periodo"=>$fk_nota_periodo
            ]);
        }
    }
}
