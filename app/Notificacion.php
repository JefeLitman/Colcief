<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model {
    protected $table = 'notificacion';
    protected $primaryKey = 'pk_notificacion';
    protected $fillable = ['pk_notificacion', 'fk_empleado','titulo', 'descripcion', 'link'];

    public function Empleado(){
      return $this->belongsTo('App\Empleado','fk_empleado','cedula');
    }
}
