<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\NotaEstudiante;
use App\MateriaBoletin;
use App\NotaDivision;

class Nota extends Model
{
    protected $table = 'nota';
    protected $primaryKey = 'pk_nota';
    // protected $fillable = ["pk_nota","fk_materia_pc","fk_periodo","fk_division","nombre","descripcion","porcentaje"];
    protected $guarded = [];

    public function MateriaPC()
    {
      return $this->belongsTo('App\MateriaPC','fk_materia_pc','pk_materia_pc');
    }

    public function Division()
    {
      return $this->belongsTo('App\division','fk_division','pk_division');
    }

    public function NotaEstudiantes()
    {
      return $this->hasMany('App\NotaEstudiante','fk_nota','pk_nota');
    }

    //By Paola
    /**
     * Esta funcion es llamada cuando un profesor crea una tupla en la tabla nota.
     * 
     * Lo que hace es crear una tupla de nota_estudiante para cada estudiante asociado al grupo
     * al que pertenece esa respectiva materia_pc. Esta tupla debe ser creada ya que en esta se
     * guardara la nota de cada estudiante.
     */
    public function crearNotasEstudiante(){
      $notasE=MateriaBoletin::select("nota_division.pk_nota_division")->join('nota_periodo','nota_periodo.fk_materia_boletin','=','materia_boletin.pk_materia_boletin')->join('nota_division'.'nota_division.fk_nota_periodo','=','nota_periodo.pk_nota_periodo')->where([['materia_boletin.fk_materia_pc',$this->fk_materia_pc],['nota_periodo.fk_periodo',$this->fk_periodo],['nota_division.fk_division',$this->fk_division]])->groupBy('pk_nota_division');
      foreach($notasE as $n){
        NotaEstudiante::create(['fk_nota_division'=>$n->pk_nota_division,'fk_nota'=>$this->pk_nota]);
      }
    }

    //Paola
    /**
     * Esta funcion es llamada cuando un profesor o director cambia el porcentaje de una nota 
     * preexistente. En cuyo caso cuando se actualiza un cambio de Nota se debe revisar si 
     * el porcenta ha sido modificado, en cuyo caso esta funcion será llamada. Debe ser llamada
     * debido a que el cambio de porcentaje de una nota afecta el valor de las notas guardadas
     * en otras tablas.
     * 
     * La funcion actualiza el valor de la nota, actualizarNota() es una funcion que 
     * actualiza en cascada las notas guardadas en las tuplas de las tablas nota_division, 
     * nota_periodo y materia_boletin. Esto para mantener la consistencia en los datos de 
     * la DB.
     */
    public function cambioPorcentaje(){
      $notasE=NotaEstudiante::select('fk_nota_division')->where('fk_nota',$this->pk_nota)->get();
      foreach($notasE as $n){
        $n->actualizarNota();
      }
    }

    //Paola
    /**
     * Esta funcion es llamada cuando un profesor o director elimina una nota. Debe ser llamada
     * debido a que la no existencia de una nota afecta el valor de las notas guardadas
     * en otras tablas.
     * 
     * La funcion actualiza el valor de la nota, actualizar nota es una funcion que 
     * actualiza en cascada las notas guardadas en las tuplas de las tablas nota_division, 
     * nota_periodo y materia_boletin. Esto para mantener la consistencia en los datos de 
     * la DB.
     */
    public function eliminacionNota(){
      $notasD=NotaDivision::select("nota_division.*")->join('nota_periodo','nota_periodo.pk_nota_periodo','=','nota_division.fk_nota_periodo')->join('materia_boletin','materia_boletin.pk_materia_boletin','=','nota_periodo.fk_materia_boletin')->where([['materia_boletin.fk_materia_pc',$this->fk_materia_pc],['nota_periodo.fk_periodo',$this->fk_periodo],['nota_division.fk_division',$this->fk_division]])->get();
      foreach ($notasD as $n) {
        $n->actualizarNota();
      }
    }

    //Paola
    /**
     * Esta funcion es llamada cuando un profesor o director cambia la division a la que pertenece 
     * una nota preexistente. En cuyo caso cuando se actualiza un cambio de Nota se debe revisar si 
     * la division ha sido modificado, en cuyo caso esta funcion será llamada. Debe ser llamada
     * debido a que el cambio de division debe verse reflejada tambien en la fk_nota_division de la
     * nota_estudiante de casa estudiante.
     * 
     * La funcion actualiza el valor de la nota de la nota division a la que pertenece y a la que 
     * pertenecia, actualizarNota() es una funcion que actualiza en cascada las notas guardadas en 
     * las tuplas de las tablas nota_division, nota_periodo y materia_boletin.
     * Ademas de esto cambia las fk_division de las tuplas nota_estudiante que tienen relacion con 
     * la tupla nota modificada. Esto para mantener la consistencia en los datos de la DB.
     */
    public function cambioDivision(){
      $notasE=NotaEstudiante::where('fk_nota',$this->pk_nota)->get();
      foreach ($notasE as $n) {
        $notaDivVieja=NotaDivision::where('pk_nota_division',$n->fk_nota_division)->get();
        if (!empty($notaDivVieja[0])) {
          $notaDivVieja=$notaDivVieja[0];
          $notaDivNueva=NotaDivision::where([['fk_nota_periodo',$notaDivVieja->fk_nota_periodo],['fk_division',$this->fk_division]])->get();
          if (!empty($notaDivNueva[0])) {
            $notaDivNueva=$notaDivNueva[0];
            $n->fk_nota_division=$notaDivNueva->pk_nota_division;
            $n->save();
            $notaDivVieja->actualizarNota();
            $notaDivNueva->actualizarNota();
          }
        }

      }
    }
}
