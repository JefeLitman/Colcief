<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $primaryKey = 'id_subject';
    protected $fillable = ['id_subject','name', 'content'];
    
    //relacion con subject_teacher_course
    public function subjectTCs(){ 
    	return $this->hasMany('App\SubjectTC');
    }
}
