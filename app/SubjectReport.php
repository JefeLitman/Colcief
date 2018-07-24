<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectReport extends Model
{
    protected $primaryKey = 'id_subject_report';
    protected $fillable = ['id_subject_report','subject_score'];

    public function subjectTCs()
    {
        return $this->belongsTo('App\SubjectTC');
    }

    public function reportCards(){
    	return $this->belongsTo('App\ReportCard');
    }

    public function studentScores(){ 
    	return $this->hasMany('App\StudentScore');
    }
}
