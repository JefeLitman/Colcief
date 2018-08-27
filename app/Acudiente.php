<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acudiente extends Model{
    protected $table = 'acudiente';
    protected $guarded = [];
    protected $dates = ['deleted_at'];
}
