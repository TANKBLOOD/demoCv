<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cv_id');
            $table->foreign('cv_id')->references('id')->on('light_cvs')->onDelete('cascade');
            $table->string('image_path');
            $table->string('f_name');
            $table->string('current_job');
            $table->string('city');
            $table->string('gender');
            $table->string('phone_number');
            $table->string('email');
            $table->string("birth_date");
            $table->string('marital_status');
            $table->text('about_me');
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
        Schema::dropIfExists('personal_infos');
    }
}
