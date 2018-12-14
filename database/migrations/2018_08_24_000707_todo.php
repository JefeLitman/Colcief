<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Todo extends Migration {

    public function up(){

        Schema::create('acudiente', function (Blueprint $table){
            $table->increments('pk_acudiente'); //diferente
            $table->string('nombre_acu_1', 50);
            $table->string('direccion_acu_1',255);
            $table->string('telefono_acu_1',12); //diferente
            $table->string('nombre_acu_2',50)->nullable();
            $table->string('direccion_acu_2',255)->nullable();
            $table->string('telefono_acu_2',12)->nullable(); //diferente
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('estudiante', function (Blueprint $table) {
            $table->increments('pk_estudiante');
            $table->unsignedInteger('fk_acudiente');
            $table->unsignedInteger('fk_curso')->nullable();
            $table->string('nombre', 50);
            $table->string('apellido', 50);
            $table->string('password', 80);
            $table->date('fecha_nacimiento');
            $table->integer('grado');
            $table->boolean('discapacidad')->nullable()->default(false);
            $table->boolean('estado')->nullable()->default(true);
            $table->string('foto')->default('/storage/default.png');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('periodo', function (Blueprint $table) {
            $table->increments('pk_periodo');
            $table->date('fecha_inicio');
            $table->dateTime('fecha_limite');
            $table->year('ano');
            $table->integer('nro_periodo');
            $table->timestamps();
        });

        Schema::create('nota_estudiante', function (Blueprint $table) {
            $table->increments('pk_nota_estudiante');//diferente
            $table->unsignedInteger('fk_estudiante');
            $table->unsignedInteger('fk_nota');
            $table->unsignedInteger('fk_nota_division');
            $table->float('nota')->default(0);
            $table->timestamps();
        });

        Schema::create('nota_division', function (Blueprint $table) {
            $table->increments('pk_nota_division');
            $table->unsignedInteger('fk_division');
            $table->unsignedInteger('fk_nota_periodo');
            $table->float('nota_division')->default(0);
            $table->timestamps();
        });

        Schema::create('nota_periodo', function (Blueprint $table) {
            $table->increments('pk_nota_periodo');
            $table->unsignedInteger('fk_periodo');
            $table->unsignedInteger('fk_materia_boletin');
            $table->float('nota_periodo')->default(0);
            $table->string('habilidad');
            $table->timestamps();
        });

        Schema::create('materia_boletin', function (Blueprint $table) {
            $table->increments('pk_materia_boletin');
            $table->unsignedInteger('fk_materia_pc');
            $table->unsignedInteger('fk_boletin');
            $table->float('nota_materia')->default(0);
            $table->timestamps();
        });

        Schema::create('boletin', function (Blueprint $table) {
            $table->increments('pk_boletin');
            $table->unsignedInteger('fk_curso');
            $table->unsignedInteger('fk_estudiante');
            $table->char('estado', 1)->default('i');
            $table->year('ano');
            $table->timestamps();
        });

        Schema::create('curso', function (Blueprint $table) {
            $table->increments('pk_curso');
            $table->string('prefijo', 15);
            $table->string('sufijo', 4);
            $table->year('ano');
            $table->timestamps();
        });

        Schema::create('nota', function (Blueprint $table) {
            $table->increments('pk_nota');
            $table->unsignedInteger('fk_division');
            $table->unsignedInteger('fk_materia_pc');
            $table->unsignedInteger('fk_periodo');
            $table->string('nombre', 50);
            $table->string('descripcion');
            $table->integer('porcentaje');
            $table->timestamps();
        });

        Schema::create('materia_pc', function (Blueprint $table) {
            $table->increments('pk_materia_pc');
            $table->unsignedInteger('fk_curso');
            $table->unsignedInteger('fk_materia');
            $table->unsignedInteger('fk_empleado');
            $table->string('nombre', 50);
            $table->char('salon', 5)->nullable();
            $table->string('logros_custom')->nullable();
            $table->timestamps();
        });

        Schema::create('division', function (Blueprint $table) {
            $table->increments('pk_division');
            $table->string('nombre', 50);
            $table->string('descripcion')->nullable();
            $table->integer('porcentaje');
            $table->year('ano');
            $table->timestamps();
        });

        Schema::create('horario', function (Blueprint $table) {
            $table->increments('pk_horario');
            $table->unsignedInteger('fk_materia_pc');
            $table->string('dia');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->timestamps();
        });

        Schema::create('materia', function (Blueprint $table) {
            $table->increments('pk_materia');
            $table->string('nombre', 50);
            $table->text('contenido');
            $table->text('logros_custom');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('empleado', function (Blueprint $table) {
            $table->unsignedInteger('cedula')->primary();
            $table->string('nombre', 50);
            $table->string('apellido', 50);
            $table->string('correo', 50);
            $table->string('password', 80);
            $table->string('direccion', 255);
            $table->string('titulo', 50);
            $table->char('role', 1); // 0 administrador, //1 director //2 profesor
            $table->integer('tiempo_extra')->default(0);
            //$table->string('director', 50)->nullable(); //Borrado By: Paola
            $table->unsignedInteger('fk_curso')->nullable(); //Foranea, curso del cual el empleado es director //Agregado By:Paola
            $table->boolean('estado')->nullable()->default(true);
            $table->string('foto')->default('/storage/default.png');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('recuperacion', function (Blueprint $table) {
            $table->unsignedInteger('pk_recuperacion')->primary();
            $table->float('nota')->nullable();
            $table->string('acta', 80);
            $table->date('fecha_presentacion');
            $table->unsignedInteger('fk_nota_periodo');
            $table->unsignedInteger('fk_empleado')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acudiente');
        Schema::dropIfExists('estudiante');
        Schema::dropIfExists('curso');
        Schema::dropIfExists('periodo');
        Schema::dropIfExists('nota_estudiante');
        Schema::dropIfExists('nota_division');
        Schema::dropIfExists('nota_periodo');
        Schema::dropIfExists('materia_boletin');
        Schema::dropIfExists('boletin');
        Schema::dropIfExists('nota');
        Schema::dropIfExists('materia_pc');
        Schema::dropIfExists('empleado');
        Schema::dropIfExists('division');
        Schema::dropIfExists('horario');
        Schema::dropIfExists('materia');
        Schema::dropIfExists('recuperacion');
    }
}
