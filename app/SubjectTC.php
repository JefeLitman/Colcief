<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectTC extends Model
{
    protected $primaryKey = 'id_subject';
    protected $fillable = ['id_subject','name', 'classroom'];
    
    //relacion con subject_teacher_course
    public function schedules(){ 
    	return $this->hasMany('App\Schedule');
    }

    public function subjectReports(){ 
    	return $this->hasMany('App\SubjectReport');
    }

    public function scores(){ 
    	return $this->hasMany('App\Score');
    }

    public function subjects(){ 
    	return $this->belongsTo('App\Subject');
    }

    public function employees(){ 
    	return $this->belongsTo('App\Employee');
    }

    public function grades(){ 
    	return $this->belongsTo('App\Grade');
    }
}
