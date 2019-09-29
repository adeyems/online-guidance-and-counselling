<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsParentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_parent', function (Blueprint $table) {
            $table->tinyIncrements('parent_no');
            $table->string('student_no');
            $table->foreign('student_no')->references('student_no')->on('students')->onDelete('cascade');
            $table->string('name');
            $table->string('surname');
            $table->string('mobile_no');
            $table->string('email')->unique();
            $table->string('password');
            $table->mediumText('address');
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
        Schema::table('students_parent', function (Blueprint $table) {
            $table->dropForeign('students_parent_student_no');
            $table->dropIndex('students_parent_student_no_index');
            $table->dropColumn('student_no');
        });
    }
}
