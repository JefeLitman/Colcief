<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    protected $primaryKey = 'id_period';
    protected $fillable = ['id_period','deadline', 'period_number', 'year', 'time_limit'];
    
    //relacion con Scores
    public function scores(){ 
    	return $this->hasMany('App\Score');
    }
}
