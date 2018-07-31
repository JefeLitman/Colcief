<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectTcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_tc', function (Blueprint $table) {
            $table->increments('id_subject_tc');
            $table->string('name', 20);
            $table->string('classroom', 20);
            $table->unsignedInteger('id_subject');
            $table->unsignedInteger('id_employee');
            $table->unsignedInteger('id_grade');
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
        Schema::dropIfExists('subject_tc');
    }
}
