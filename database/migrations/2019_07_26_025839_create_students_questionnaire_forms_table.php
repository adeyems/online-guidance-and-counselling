<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsQuestionnaireFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_questionnaire_forms', function (Blueprint $table) {
            $table->tinyIncrements('questionnaire_form_reference_no');
            $table->string('student_no');
            $table->foreign('student_no')->references('student_no')->on('students')->onDelete('cascade');
            $table->unsignedTinyInteger('appointment_reference_no');
            $table->foreign('appointment_reference_no')->references('appointment_bookings_reference_no')->on('appointment_bookings');
            $table->text('problem_description');
            $table->date('start_date_of_noticed_problems');
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
        Schema::dropIfExists('students_questionnaire_forms');
    }
}
