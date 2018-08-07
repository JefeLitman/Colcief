<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    protected $primaryKey = 'id_student';
    protected $fillable = ['id_student','first_name', 'last_name', 'email', 'password', 'phone', 'birthday', 'grade'];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function attendants()
    {
        return $this->belongsToMany('App\Attendant')->withPivot('relationship');
    }

    public function reportCards()
    {
        return $this->hasMany('App\ReportCard');
    }
}
