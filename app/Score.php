<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $primaryKey = 'id_score';
    protected $fillable = ['id_score','name', 'percentage', 'description'];
    
    //relacion con periods
    public function periods(){ 
    	return $this->hasMany('App\Period');
    }
 	//relacion con divisions
    public function divisions(){ 
    	return $this->hasMany('App\Division');
    }

}
