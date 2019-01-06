<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;

use App\Boletin;
use App\MateriaBoletin;
use App\Periodo;
use App\NotaPeriodo;
use App\Division;
use App\NotaDivision;
use App\Curso;
use App\Nota;
use App\NotaEstudiante;

class Estudiante extends Authenticatable {

    use SoftDeletes;
    use Notifiable;
	protected $primaryKey = "pk_estudiante";
    protected $table = 'estudiante';
    protected $fillable = ['pk_estudiante','fk_curso','fk_acudiente','nombre', 'apellido', 'password', 'fecha_nacimiento', 'grado', 'discapacidad', 'estado', 'foto'];
    protected $dates = ['deleted_at'];
    protected $casts = ['discapacidad' => 'boolean', 'estado' => 'boolean'];
    protected $hidden = ['password'];

    public function resetPassword(){
        $this -> password = Hash::make($this -> pk_estudiante.'.'.$this->apellido.'.'.$this->nombre);
        $this -> save();
        return '{su codigo estudiantil}.{su apellido}.{su nombre} Ejemplo: 2143.rodriguez.marina';
    }

    public function session(){
        return $this->attributes;
    }

    public function curso(){
        return $this->belongsTo('App\Curso','fk_curso', 'pk_curso');
    }

    public function notasEstudiante()
    {
      return $this->hasMany('App\NotaEstudiante','fk_estudiante','pk_estudiante');
    }

    public function cambioCurso(){
        $boletin=Boletin::where([["ano",date('Y')],["fk_estudiante",$this->pk_estudiante]])->get();
        if ($this->fk_curso!=null) {
            foreach ($boletin as $b) {
                if ($b->fk_curso!=$this->fk_curso) {
                    $b->delete();
                }
            }
            $this->crearEstructuraDatos();
        }
    }

    private function crearEstructuraDatos(){
        $boletinNuevo=Boletin::create([
            'ano'=>date('Y'),
            'fk_estudiante'=>$this->pk_estudiante,
            'fk_curso'=>$this->fk_curso
        ]);
        $materias=Curso::select('materia_pc.pk_materia_pc')->where('pk_curso',$this->fk_curso)->join('materia_pc','materia_pc.fk_curso','=','curso.pk_curso')->get();
        $periodos=Periodo::where('ano',date('Y'))->get();
        $divisiones=Division::where('ano',date('y'))->get();
        foreach ($materias as $m) {
            $materiaBoletin=MateriaBoletin::create([
                'fk_materia_pc'=>$m->pk_materia_pc,
                'fk_boletin'=>$boletinNuevo->pk_boletin
            ]);
            foreach ($periodos as $p) {
                $notaperiodo=NotaPeriodo::create([
                    'fk_materia_boletin'=>$materiaBoletin->pk_materia_boletin,
                    'fk_periodo'=>$p->pk_periodo
                ]);
                foreach ($divisiones as $d) {
                    $notaDivision=NotaDivision::create([
                        'fk_nota_periodo'=>$notaperiodo->pk_nota_periodo,
                        'fk_division'=>$d->pk_division
                    ]);
                    $notas=Nota::where([['fk_materia_pc',$m->pk_materia_pc],['fk_periodo',$p->pk_periodo],['fk_division',$d->pk_division]])->get();
                    foreach ($notas as $n) {
                        NotaEstudiante::create([
                            'fk_nota'=>$n->pk_nota,
                            'fk_nota_division'=>$notaDivision->pk_nota_division
                        ]);
                    }
                }
            }
        }
    }

}