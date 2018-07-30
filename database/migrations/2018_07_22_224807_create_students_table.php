<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->primary('id_student');
            $table->unsignedInteger('id_student');
            $table->string('firts_name', 30);
            $table->string('last_name', 30);
            $table->string('email', 40)->unique();
            $table->string('password', 100);
            $table->string('phone', 10);
            $table->date('birthday');
            $table->char('grade', 8);
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
        Schema::dropIfExists('students');
    }
}
