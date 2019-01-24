<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\MateriaBoletin;
use App\Nivelacion;

class Boletin extends Model
{
    protected $table = 'boletin';
    protected $primaryKey = 'pk_boletin';
    protected $fillable = ['pk_boletin','fk_estudiante','fk_curso','estado','ano'];
    protected $guarded = [];

    public function estudiante()
    {
      return $this->belongsTo('App\Estudiante','fk_estudiante','pk_estudiante');
    }

    public function materia_boletines()
    {
      return $this->hasMany('App\MateriaBoletin','fk_boletin','pk_boletin');
    }

    public function curso()
    {
      return $this->belongsTo('App\Curso','fk_curso','pk_curso');
    }

    /**
     * Verifica si el estudiante paso el año, es decir perdio menos de 3 materias.
     * Se debe ejecutar al finalizar el año escolar. Debe ser llamado desde el modelo Fecha
     * Si pasa el año crea una tupla en nivelacion. 
     * Y asigna el valor correspondiente al atributo estado
     * estado (default:'i' 
     *  Valores{ 
     *    i: Indefinido (Año no acado) 
     *    a: Aprobó 
     *    p: Perdió 
     *  } 
     * )
     */
    public function verificar(){
      $materiasBoletin=MateriaBoletin::select('materia_boletin.pk_materia_boletin','materia_pc.fk_empleado')
      ->where([['materia_boletin.fk_boletin',$this->pk_boletin],['materia_boletin.nota_materia','<',3]])
      ->join('materia_pc','materia_pc.pk_materia_pc','=','materia_boletin.fk_materia_pc')->get();
      if(count($materiasBoletin)<3){
        $this->estado='a';//Aprovó
        //Creando nivelaciones
        foreach ($materiasBoletin as $m) {
          Nivelacion::create([
            'fk_empleado'=>$m->fk_empleado,
            'fk_materia_boletin'=>$m->pk_materia_boletin
          ]);
        }
      }else{
        $this->estado='p'; //Perdió
      }
      $this->save();
    
    }
}
