<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Todo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acudiente', function (Blueprint $table) {
            $table->increments('pk_acudiente'); //diferente
            $table->string('nombre_acu_1', 50);
            $table->string('direccion_acu_1',30);
            $table->string('telefono_acu_1',10); //diferente
            $table->string('nombre_acu_2',50)->nullable();
            $table->string('direccion_acu_2',30)->nullable();
            $table->string('telefono_acu_2',10)->nullable(); //diferente
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('estudiante', function (Blueprint $table) {
            $table->increments('pk_estudiante');
            $table->unsignedInteger('fk_acudiente');
            $table->string('nombre', 20);
            $table->string('apellido', 20);
            $table->string('password', 80);
            $table->date('fecha_nacimiento');
            $table->integer('grado');
            $table->boolean('discapacidad')->nullable()->default(false);
            $table->boolean('estado')->nullable()->default(true);
            $table->string('foto')->default('descarga.png');
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
            $table->unsignedInteger('fk_nota_periodo');
            $table->integer('nota');
            $table->timestamps();
        });

        Schema::create('nota_periodo', function (Blueprint $table) {
            $table->increments('pk_nota_periodo');
            $table->unsignedInteger('fk_periodo');
            $table->unsignedInteger('fk_materia_boletin');
            $table->integer('nota_final');
            $table->string('habilidad');
            $table->timestamps();
        });

        Schema::create('materia_boletin', function (Blueprint $table) {
            $table->increments('pk_materia_boletin');
            $table->unsignedInteger('fk_materia_pc');
            $table->unsignedInteger('fk_boletin');
            $table->integer('nota_materia');
            $table->timestamps();
        });

        Schema::create('boletin', function (Blueprint $table) {
            $table->increments('pk_boletin');
            $table->unsignedInteger('fk_curso');
            $table->unsignedInteger('fk_estudiante');
            $table->char('estado', 1);
            $table->year('ano');
            $table->integer('nota_final');
            $table->timestamps();
        });

        Schema::create('curso', function (Blueprint $table) {
            $table->increments('pk_curso');
            $table->string('nombre', 20);
            $table->timestamps();
        });

        Schema::create('nota', function (Blueprint $table) {
            $table->increments('pk_nota');
            $table->unsignedInteger('fk_division');
            $table->unsignedInteger('fk_materia_pc');
            $table->string('nombre', 20);
            $table->string('descripcion');
            $table->integer('porcentaje');
            $table->timestamps();
        });

        Schema::create('materia_pc', function (Blueprint $table) {
            $table->increments('pk_materia_pc');
            $table->unsignedInteger('fk_empleado');
            $table->unsignedInteger('fk_curso');
            $table->unsignedInteger('fk_materia');
            $table->string('nombre', 20);
            $table->char('salon', 5);
            $table->string('logros_custom');
            $table->timestamps();
        });

        Schema::create('empleado', function (Blueprint $table) {
            $table->unsignedInteger('cedula');
            $table->string('nombre', 20);
            $table->string('apellido', 20);
            $table->string('correo', 20);
            $table->string('password', 80);
            $table->string('direccion', 20);
            $table->string('titulo', 20);
            $table->char('rol', 1); // 0 admin, //1 profe //2 dir
            $table->integer('tiempo_extra');
            $table->string('director', 20);
            $table->boolean('estado')->nullable()->default(true);
            $table->string('foto')->default('descarga.png');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('division', function (Blueprint $table) {
            $table->increments('pk_division');
            $table->string('nombre', 20);
            $table->string('descripcion')->nullable();
            $table->integer('porcentaje');
            $table->date('limite');
            $table->year('ano');
            $table->timestamps();
        });

        Schema::create('horario', function (Blueprint $table) {
            $table->increments('pk_horario');
            $table->unsignedInteger('fk_materia_pc');
            $table->date('dia');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->timestamps();
        });

        Schema::create('materia', function (Blueprint $table) {
            $table->increments('pk_materia');
            $table->string('nombre', 20);
            $table->text('contenido');
            $table->text('logros_custom');
            $table->timestamps();
            $table->softDeletes();
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acudientes');
        Schema::dropIfExists('estudiantes');
        Schema::dropIfExists('periodos');
        Schema::dropIfExists('nota_estudiante');
        Schema::dropIfExists('nota_periodo');
        Schema::dropIfExists('materia_boletin');
        Schema::dropIfExists('boletin');
        Schema::dropIfExists('curso');
        Schema::dropIfExists('nota');
        Schema::dropIfExists('materia_pc');
        Schema::dropIfExists('empleado');
        Schema::dropIfExists('division');
        Schema::dropIfExists('horario');
        Schema::dropIfExists('materia');
    }
}
