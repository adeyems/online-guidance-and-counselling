<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsCaseFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_case_forms', function (Blueprint $table) {
            $table->tinyIncrements('case_reference_no');
            $table->unsignedTinyInteger('appointment_bookings_reference_no');
            $table->foreign('appointment_bookings_reference_no')->references('appointment_bookings_reference_no')->on('appointment_bookings');
            $table->unsignedTinyInteger('questionnaire_reference_no');
            $table->foreign('questionnaire_reference_no')->references('questionnaire_form_reference_no')->on('students_questionnaire_forms');
            $table->unsignedTinyInteger('employment_no');
            $table->unsignedTinyInteger('student_no');
            $table->foreign('student_no')->references('student_no')->on('students')->onDelete('cascade');
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
        Schema::dropIfExists('students_case_forms');
    }
}
