<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Fks extends Migration {

    public function up(){
        Schema::table('estudiante', function (Blueprint $table) {
            $table->foreign('fk_acudiente')->references('pk_acudiente')->on('acudiente')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('fk_curso')->references('pk_curso')->on('curso')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('boletin', function (Blueprint $table) {
            $table->foreign('fk_curso')->references('pk_curso')->on('curso')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('fk_estudiante')->references('pk_estudiante')->on('estudiante')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('materia_boletin', function (Blueprint $table) {
            $table->foreign('fk_materia_pc')->references('pk_materia_pc')->on('materia_pc')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('fk_boletin')->references('pk_boletin')->on('boletin')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('nota_periodo', function (Blueprint $table) {
            $table->foreign('fk_periodo')->references('pk_periodo')->on('periodo')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('fk_materia_boletin')->references('pk_materia_boletin')->on('materia_boletin')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('nota_division', function (Blueprint $table) {
            $table->foreign('fk_division')->references('pk_division')->on('division')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('fk_nota_periodo')->references('pk_nota_periodo')->on('nota_periodo')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('nota_estudiante', function (Blueprint $table) {
            $table->foreign('fk_estudiante')->references('pk_estudiante')->on('estudiante')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('fk_nota')->references('pk_nota')->on('nota')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('fk_nota_division')->references('pk_nota_division')->on('nota_division')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('nota', function (Blueprint $table) {
            $table->foreign('fk_division')->references('pk_division')->on('division')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('fk_materia_pc')->references('pk_materia_pc')->on('materia_pc')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('fk_periodo')->references('pk_periodo')->on('periodo')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('materia_pc', function (Blueprint $table) {
            $table->foreign('fk_curso')->references('pk_curso')->on('curso')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('fk_materia')->references('pk_materia')->on('materia')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('fk_empleado')->references('cedula')->on('empleado')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('horario', function (Blueprint $table) {
            $table->foreign('fk_materia_pc')->references('pk_materia_pc')->on('materia_pc')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('empleado', function (Blueprint $table) {
            $table->foreign('fk_curso')->references('pk_curso')->on('curso')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('recuperacion', function (Blueprint $table) {
            $table->foreign('fk_nota_periodo')->references('pk_nota_periodo')->on('nota_periodo')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('estudiante', function (Blueprint $table) {
            $table->dropForeign('estudiante_fk_acudiente_foreign');
        });

        Schema::table('boletin', function (Blueprint $table) {
            $table->dropForeign('boletin_fk_curso_foreign');
            $table->dropForeign('boletin_fk_estudiante_foreign');
        });

        Schema::table('materia_boletin', function (Blueprint $table) {
            $table->dropForeign('materia_boletin_fk_boletin_foreign');
            $table->dropForeign('materia_boletin_fk_materia_pc_foreign'); 
        });

        Schema::table('nota_periodo', function (Blueprint $table) {
            $table->dropForeign('nota_periodo_fk_periodo_foreign');
            $table->dropForeign('nota_periodo_fk_materia_boletin_foreign'); 
        });

        Schema::table('nota_estudiante', function (Blueprint $table) {
            $table->dropForeign('nota_estudiante_fk_estudiante_foreign');
            $table->dropForeign('nota_estudiante_fk_nota_foreign'); 
            $table->dropForeign('nota_estudiante_fk_nota_division_foreign');
        });

        Schema::table('nota', function (Blueprint $table) {
            $table->dropForeign('nota_fk_division_foreign');
            $table->dropForeign('nota_fk_materia_pc_foreign'); 
            $table->dropForeign('nota_fk_periodo_foreign'); 
        });

        Schema::table('materia_pc', function (Blueprint $table) {
            $table->dropForeign('materia_pc_fk_curso_foreign');
            $table->dropForeign('materia_pc_fk_materia_foreign'); 
            $table->dropForeign('materia_pc_fk_empleado_foreign');
        });

        Schema::table('horario', function (Blueprint $table) {
            $table->dropForeign('horario_fk_materia_pc_foreign');
        });

        Schema::table('empleado', function (Blueprint $table) { //Agregado By: Paola
            $table->dropForeign('empleado_fk_curso_foreign');
        });

        Schema::table('recuperacion', function (Blueprint $table) { //Agregado By: Paola
            $table->dropForeign('recuperacion_fk_nota_periodo_foreign');
        });
    }
}
