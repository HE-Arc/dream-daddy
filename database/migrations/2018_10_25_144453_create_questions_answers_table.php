<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions_answers', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('donor_id');
          $table->foreign('donor_id')->references('id')->on('donors');
          $table->unsignedInteger('seeker_id');
          $table->foreign('seeker_id')->references('id')->on('seekers');
          $table->string('message');
          $table->boolean('anonymous')->nullable();
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
        Schema::dropIfExists('questions_answers');
    }
}
