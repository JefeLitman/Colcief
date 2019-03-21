<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    protected $table = 'puesto';
    protected $primaryKey = 'pk_puesto';
    protected $guarded = [];
}
