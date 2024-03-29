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
            $table->bigIncrements('id');
            $table->string('case_reference_no')->unique();
            $table->string('appointment_bookings_reference_no');
            $table->foreign('appointment_bookings_reference_no')->references('appointment_bookings_reference_no')->on('appointment_bookings');
            $table->string('questionnaire_ref');
            $table->foreign('questionnaire_ref')->references('questionnaire_form_ref')->on('students_questionnaire_forms');
            $table->string('employment_no');
            $table->string('student_no');
            $table->mediumText('case_details');
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
