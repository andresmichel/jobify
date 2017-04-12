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
            $table->boolean('picture')->default(false);
            $table->text('description');
            $table->text('goal');
            $table->string('address');
            $table->text('languages'); // JSON
            $table->text('skills'); // JSON
            $table->text('education'); // JSON
            $table->text('experience'); // JSON
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
