<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model 
{
    protected $primaryKey = 'id_grade';
    protected $fillable = ['id_grade','name'];

    public function reportCards()
    {
        return $this->hasMany('App\ReportCard');
    }
    //relacion con subject_teacher_course
    public function subjectTCs(){ 
    	return $this->hasMany('App\SubjectTC');
    }
}
