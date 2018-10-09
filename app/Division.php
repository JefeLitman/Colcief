<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model{
    protected $primaryKey = "pk_division";
    protected $table = 'division';
    // protected $guarded = [];
    protected $dates = ['deleted_at'];
}
