<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Curso;
use App\MateriaBoletin;
use App\NotaPeriodo;
use App\NotaDivision;
use App\Nota;
use App\NotaEstudiante;
use App\Periodo;
use App\Division;

class MateriaPC extends Model
{
    protected $table = 'materia_pc';
    protected $primaryKey = 'pk_materia_pc';
    protected $fillable = ['nombre','fk_curso','fk_empleado','fk_materia','curso','salon'];

    public function Notas()
    {
      return $this->hasMany('App\Nota','fk_materia_pc','pk_materia_pc');
    }

    public function Materia()
    {
      return $this->belongsTo('App\Materia','fk_materia','pk_materia');
    }

    public function Empleado()
    {
      return $this->belongsTo('App\Empleado','fk_empleado','pk_empleado');
    }

    public function Curso()
    {
      return $this->belongsTo('App\Curso','fk_curso','pk_curso');
    }

    public function Horarios(){
      return $this->hasMany('App\Horario', 'fk_materia_pc', 'pk_materia_pc');
    }

    public function crearEstructuraNotas(){
      $boletines=Curso::join('boletin','boletin.fk_curso','=','curso.pk_curso')->where('curso.pk_curso',$this->fk_curso)->get();
      $periodos=Periodo::where('ano',date('Y'));
      $divisiones=Division::where('ano',date('Y'));
      foreach ($boletines as $b) {
        $materiaBoletin=MateriaBoletin::create(['fk_materia_pc'=>$this->pk_materia_pc,'fk_boletin'=>$b->pk_boletin]);
        foreach ($periodos as $p) {
          $perActual=NotaPeriodo::create(['fk_materia_boletin'=>$materiaBoletin->pk_materia_boletin,'fk_periodo'=>$p->pk_periodo]);
          foreach ($divisiones as $d) {
            NotaDivision::create(['fk_nota_periodo'=>$perActual,'fk_division'=>$d->pk_division]);
          }
        }
      }
    }

    public function modificarCurso(){
      $materiasBoletin=MateriaBoletin::where('fk_materia_pc',$this->pk_materia_pc)->get();
      // Elimina materias de otros cursos
      foreach ($materiasBoletin as $m) {
          $m->delete();
      }

      // Crear estructura
      $boletines=Curso::join('boletin','boletin.fk_curso','=','curso.pk_curso')->where('curso.pk_curso',$this->fk_curso)->get();
      $periodos=Periodo::where('ano',date('Y'));
      $divisiones=Division::where('ano',date('Y'));
      foreach ($boletines as $b) {
        $materiaBoletin=MateriaBoletin::create(['fk_materia_pc'=>$this->pk_materia_pc,'fk_boletin'=>$b->pk_boletin]);
        foreach ($periodos as $p) {
          $perActual=NotaPeriodo::create(['fk_materia_boletin'=>$materiaBoletin->pk_materia_boletin,'fk_periodo'=>$p->pk_periodo]);
          foreach ($divisiones as $d) {
            $notaDivision=NotaDivision::create(['fk_nota_periodo'=>$perActual,'fk_division'=>$d->pk_division]);
            $notas=Nota::where([['fk_materia_pc',$this->pk_materia_pc],['fk_periodo',$p->pk_periodo],['fk_division',$d->pk_division]])->get();
            foreach ($notas as $n) {
              NotaEstudiante::create(['fk_nota'=>$n->pk_nota,'fk_nota_division'=>$notaDivision->pk_nota_division]);
            }
          }
        }
      }
    }

}
