<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionsTable extends Migration {
    /* Comente esta migracion para realizar la actualizacion de la base de datos actumatica.
        Existe un controlador para ejecutar comandos de la terminal, ya que no hay acceso SSH, a este controlador se accede mediante el metodo get, ya que estamos trabajando con session por DB, laravel no permite ejecutar el servidor sin que exista la tabla 'session', entonces, si en el servidor no existe esta tabla no se puede acceder a ningun metodo del controlador terminal.
        Al comentar esta migracion evito que el migrate:reset la elimine  */
    public function up(){

        // Schema::create('sessions', function (Blueprint $table) {
        //     $table->string('id',180)->unique();
        //     $table->unsignedInteger('user_id')->nullable();
        //     $table->string('ip_address', 45)->nullable();
        //     $table->text('user_agent')->nullable();
        //     $table->text('payload');
        //     $table->integer('last_activity');
        // });
    }

    public function down(){
        // Schema::dropIfExists('sessions');
    }
}
