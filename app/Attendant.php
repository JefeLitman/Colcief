<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendant extends Model
{
    protected $primaryKey = 'id_attendant';

    protected $fillable = ['id_attendant', 'first_name', 'last_name', 'email', 'address', 'phone'];
    
    public function students()
    {
        return $this->belongsToMany('App\Student')->withPivot('relationship');
    }

}
	