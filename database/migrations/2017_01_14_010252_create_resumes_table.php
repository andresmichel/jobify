<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resumes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('aspirant_id')->unsigned()->unique();
            $table->string('name');
            $table->string('ext');
            $table->string('path');
            $table->integer('size');
            $table->string('type');
            //
            // $table->string('address');
            // $table->string('cp');
            // $table->string('academic_data');
            // $table->string('complementary_data');
            // $table->string('languages');
            // $table->string('experiance');
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
        Schema::dropIfExists('resumes');
    }
}
