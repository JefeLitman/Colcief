<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendantsStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendants_students', function (Blueprint $table) {
            $table->unsignedInteger('id_attendant');
            $table->unsignedInteger('id_student');
            $table->string('relationship', 20);
            $table->primary(['id_attendant', 'id_student']);
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
        Schema::dropIfExists('attendants_students');
    }
}
