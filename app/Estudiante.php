<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Estudiante extends Authenticatable{
	protected $primaryKey = "pk_estudiante";
    protected $table = 'estudiante';    
    protected $guarded = ['password', 'remember_token'];
    protected $dates = ['deleted_at'];
}

