<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendant extends Model
{
    protected $primaryKey = 'cedula';
    protected $fillable = ['cedula', 'first_name', 'last_name', 'email', 'address', 'phone'];

    public function students()
    {
        return $this->belongsToMany('App\Student')->withPivot('relationship');
    }

}
	