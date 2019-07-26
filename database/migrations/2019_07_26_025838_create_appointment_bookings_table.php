<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment_bookings', function (Blueprint $table) {
            $table->tinyIncrements('appointment_bookings_reference_no');
            $table->unsignedTinyInteger('student_no');
            $table->foreign('student_no')->references('student_no')->on('students')->onDelete('cascade');
            $table->string('subject_of_booking');
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
        Schema::table('appointment_bookings', function (Blueprint $table) {
            $table->dropForeign('appointment_bookings_student_no');
            $table->dropIndex('appointment_bookings_student_no_index');
            $table->dropColumn('student_no');
        });
    }
}
