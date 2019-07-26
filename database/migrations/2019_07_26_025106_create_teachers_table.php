<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->tinyIncrements('employment_no');
            $table->string('name');
            $table->string('surname');
            $table->mediumText('address');
            $table->string('mobile_no');
            $table->string('email')->unique();
            $table->string('position');
            $table->string('subject_taught');
            $table->unsignedTinyInteger('level_of_teaching');
            $table->string('password');
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
        Schema::dropIfExists('teachers');
    }
}
