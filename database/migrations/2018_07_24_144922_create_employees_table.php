<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->primary('id_employee');
            $table->unsignedInteger('id_employee');
            $table->integer('id_card')->unique();
            $table->string('first_name', 30);
            $table->string('last_name', 30);
            $table->string('email', 40)->unique();
            $table->string('password', 100);
            $table->string('address', 50);
            $table->string('degree', 40);
            $table->string('role', 15);
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
        Schema::dropIfExists('employees');
    }
}
