<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportCard extends Model
{
    protected $primaryKey = 'id_report_card';
    protected $fillable = ['id_report_card','approved', 'year', 'final_score'];

    public function students()
    {
        return $this->belongsTo('App\Student');
    }

    public function grades(){
    	return $this->belongsTo('App\Grade');
    }

    public function subjectReports(){ 
    	return $this->hasMany('App\SubjectReport');
    }
}
