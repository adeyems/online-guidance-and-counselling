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
            $table->tinyIncrements('id');
            $table->string('employment_no')->unique();
            $table->string('name');
            $table->string('surname');
            $table->mediumText('address');
            $table->string('mobile_no');
            $table->string('email')->unique();
            $table->enum('position', ['Grad Senior Master', 'Principal']);
            $table->string('subject_taught');
            $table->enum('level_of_teaching', ['12', '13', '14', '15']);
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
