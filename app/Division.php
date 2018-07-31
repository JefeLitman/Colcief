<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $primaryKey = 'id_division';
    protected $fillable = ['id_division','name', 'percentage', 'description', 'year'];
    
    //relacion con Scores
    public function scores(){ 
    	return $this->hasMany('App\Score');
    }
}
