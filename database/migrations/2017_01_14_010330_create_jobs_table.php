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
            $table->string('contract');
            $table->string('area');
            $table->text('education'); // JSON
            $table->string('shift');
            $table->text('gender'); // JSON
            $table->text('requirements'); // JSON
            $table->integer('min_age')->nullable();
            $table->integer('max_age')->nullable();
            $table->float('salary')->nullable();
            $table->text('language'); // JSON
            $table->string('state');
            $table->string('city');
            $table->boolean('active')->default(true);
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
