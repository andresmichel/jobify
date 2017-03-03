<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->text('contract');
            $table->string('area');
            $table->string('education');
            $table->string('shift');
            $table->string('gender');
            $table->text('experience');
            $table->integer('min_age');
            $table->integer('max_age');
            $table->string('schedule');
            $table->string('hours');
            $table->string('salary');
            $table->string('language');
            $table->string('state');
            $table->string('city');
            $table->boolean('status');
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
        Schema::dropIfExists('vacancies');
    }
}
