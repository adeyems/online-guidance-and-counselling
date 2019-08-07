<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsCaseReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_case_reports', function (Blueprint $table) {
            $table->tinyIncrements('report_reference_no');
            $table->unsignedTinyInteger('case_reference_no');
            $table->foreign('case_reference_no')->references('case_reference_no')->on('students_case_forms');
            $table->unsignedTinyInteger('questionnaire_reference_no');
            $table->foreign('questionnaire_reference_no')->references('questionnaire_form_reference_no')->on('students_questionnaire_forms');
            $table->string('student_no');
            $table->foreign('student_no')->references('student_no')->on('students')->onDelete('cascade');
            $table->text('case_details');
            $table->unsignedTinyInteger('parent_no_requesting');
            $table->foreign('parent_no_requesting')->references('parent_no')->on('students_parent')->onDelete('cascade');
            $table->string('employment_no');
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
        Schema::dropIfExists('students_case_reports');
    }
}
