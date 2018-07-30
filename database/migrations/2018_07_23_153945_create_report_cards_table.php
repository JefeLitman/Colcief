<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_cards', function (Blueprint $table) {
            $table->increments('id_report_card');
            $table->unsignedInteger('id_grade');
            $table->unsignedInteger('id_student');
            $table->boolean('approved');
            $table->year('year');
            $table->decimal('final_score', 8, 2);
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
        Schema::dropIfExists('report_cards');
    }
}
