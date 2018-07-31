<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Fks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('report_cards', function($table) {
            $table->foreign('id_student')->references('id_student')->on('students');
            $table->foreign('id_grade')->references('id_grade')->on('grades');
        });

        Schema::table('attendants_students', function($table) {
            $table->foreign('id_attendant')->references('id_attendant')->on('attendants');
            $table->foreign('id_student')->references('id_student')->on('students');
        });


        Schema::table('subject_reports', function($table) {
            $table->foreign('id_report_card')->references('id_report_card')->on('report_cards');
            $table->foreign('id_subject_tc')->references('id_subject_tc')->on('subject_tc');
        });

        Schema::table('scores', function($table) {
            // Foreign keys scores
            $table->foreign('id_division')->references('id_division')->on('divisions');
            $table->foreign('id_period')->references('id_period')->on('periods');
            $table->foreign('id_subject_tc')->references('id_subject_tc')->on('subject_tc');
        });

        Schema::table('subject_tc', function($table) {
            // Foreign keys subject tcs
            $table->foreign('id_subject')->references('id_subject')->on('subjects');
            $table->foreign('id_employee')->references('id_employee')->on('employees');
            $table->foreign('id_grade')->references('id_grade')->on('grades');
        });

        Schema::table('schedules', function($table) {
            // Foreign Keys student scores
            $table->foreign('id_subject_tc')->references('id_subject_tc')->on('subject_tc');
        });

        Schema::table('student_scores', function($table) {
            // Foreign Keys student scores
            $table->foreign('id_score')->references('id_score')->on('scores');
            $table->foreign('id_subject_report')->references('id_subject_report')->on('subject_reports');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('report_cards', function($table) {
            $table->dropForeign('report_cards_id_student_foreign');
            $table->dropForeign('report_cards_id_grade_foreign');
        });

        Schema::table('attendants_students', function($table) {
            $table->dropForeign('attendants_students_id_attendant_foreign');
            $table->dropForeign('attendants_students_id_student_foreign');
        });


        Schema::table('subject_reports', function($table) {
            $table->dropForeign('subject_reports_id_report_card_foreign');
            $table->dropForeign('subject_reports_id_subject_tc_foreign');
        });

        Schema::table('scores', function($table) {
            $table->dropForeign('scores_id_division_foreign');
            $table->dropForeign('scores_id_period_foreign');
            $table->dropForeign('scores_id_subject_tc_foreign');
        });

        Schema::table('subject_tc', function($table) {
            $table->dropForeign('subject_tc_id_subject_foreign');
            $table->dropForeign('subject_tc_id_employee_foreign');
            $table->dropForeign('subject_tc_id_grade_foreign');
        });

        Schema::table('schedules', function($table) {
            $table->dropForeign('schedules_id_subject_tc_foreign');
        });

        Schema::table('student_scores', function($table) {
            $table->dropForeign('student_scores_id_score_foreign');
            $table->dropForeign('student_scores_id_subject_report_foreign');
        });
    }
}
