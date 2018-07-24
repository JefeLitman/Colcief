<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $primaryKey = 'id_schedule';
    protected $fillable = ['id_schedule','day', 'start_time', 'end_time'];
    
    //relacion con subject_teacher_course
    public function subjectTCs(){ 
    	return $this->belongsTo('App\SubjectTC');
    }
}
