<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotaDivision extends Model
{
    protected $table = 'nota_division';
    protected $primaryKey = 'pk_nota_division';
    protected $fillable = ['pk_nota_division','fk_division','fk_nota_periodo','nota_division'];
}
