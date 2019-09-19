<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuidanceCounsellorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guidance_counsellors', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('employment_no')->unique();
            $table->string('surname');
            $table->string('name');
            $table->mediumText('address');
            $table->string('mobile_no');
            $table->string('email')->unique();
            $table->enum('position', ['Grad Senior Master', 'Principal']);
            $table->enum('level_of_guidance_and_counselling', ['12', '13', '14', '15']);
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
        Schema::dropIfExists('guidance_counsellors');
    }
}
