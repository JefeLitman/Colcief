<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentScore extends Model
{
    protected $primaryKey = 'id_student_score';
    protected $fillable = ['id_student_score','score'];

    public function subjectReports()
    {
        return $this->belongsTo('App\SubjectReport');
    }

    public function scores(){
    	return $this->belongsTo('App\Score');
    }
}
