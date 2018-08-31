<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleado';
    protected $primaryKey = 'pk_empleado';
    protected $guarded = [];
    protected $dates = ['deleted_at'];
}
