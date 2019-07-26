<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsVideoCallRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_video_call_requests', function (Blueprint $table) {
            $table->tinyIncrements('request_reference_no');
            $table->unsignedTinyInteger('parent_no');
            $table->foreign('parent_no')->references('parent_no')->on('students_parent')->onDelete('cascade');
            $table->unsignedTinyInteger('student_no');
            $table->foreign('student_no')->references('student_no')->on('students')->onDelete('cascade');
            $table->unsignedTinyInteger('case_reference_no');
            $table->foreign('case_reference_no')->references('case_reference_no')->on('students_case_forms');
            $table->unsignedTinyInteger('questionnaire_reference_no');
            $table->foreign('questionnaire_reference_no')->references('questionnaire_form_reference_no')->on('students_questionnaire_forms');
            $table->text('video_or_call_details');
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
        Schema::dropIfExists('students_video_call_requests');
    }
}
