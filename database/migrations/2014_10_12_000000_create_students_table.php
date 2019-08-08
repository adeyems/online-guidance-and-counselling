<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('student_no')->unique();
            $table->string('name');
            $table->string('surname');
            $table->string('mobile_no');
            $table->mediumText('address');
            $table->date('date_of_birth');
            $table->enum('class', ['Grade 8 Class 2', 'Grade 9 Class 1', 'Grade 9 Class 2']);
            $table->string('password');
            $table->string('email')->unique();
            $table->string('class_teacher_name');
            $table->string('class_teacher_surname');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('students');
    }
}
