<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->boolean('fulltime')->default(1);
            $table->string('area');
            $table->string('shift');
            $table->text('requirements'); // JSON
            $table->double('salary')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->boolean('remote')->default(0);
            $table->boolean('active')->default(1);
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
        Schema::dropIfExists('jobs');
    }
}
