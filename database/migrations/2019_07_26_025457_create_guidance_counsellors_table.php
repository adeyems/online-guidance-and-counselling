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
            $table->tinyIncrements('employment_no');
            $table->string('name');
            $table->string('surname');
            $table->mediumText('address');
            $table->string('mobile_no');
            $table->string('email')->unique();
            $table->string('position');
            $table->unsignedTinyInteger('level_of_guidance_and_counselling');
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
