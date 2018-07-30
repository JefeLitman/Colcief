<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $primaryKey = 'id_score';
    protected $fillable = ['id_score','name', 'percentage', 'description'];
    
    //relacion con periods
    public function periods(){ 
    	return $this->belongsTo('App\Period');
    }
 	//relacion con divisions
    public function divisions(){ 
    	return $this->belongsTo('App\Division');
    }

    //relacion con subject_teacher_course
    public function subjectTCs(){ 
    	return $this->belongsTo('App\SubjectTC');
    }

    public function studentScores(){ 
    	return $this->hasMany('App\StudentScore');
    }

}
