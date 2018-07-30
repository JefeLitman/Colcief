<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_reports', function (Blueprint $table) {
            $table->increments('id_subject_report');
            $table->decimal('subject_score', 8, 2);
            $table->unsignedInteger('id_report_card');
            $table->unsignedInteger('id_subject_tc');
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
        Schema::dropIfExists('subject_reports');
    }
}
