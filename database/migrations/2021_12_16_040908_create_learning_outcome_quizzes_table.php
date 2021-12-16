<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearningOutcomeQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learning_outcome_quizzes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("learning_outcome_id");
            $table->foreign("learning_outcome_id")->on("learning_outcomes")->references("id");
            $table->unsignedBigInteger("quiz_id");
            $table->foreign("quiz_id")->on("quizzes")->references("id");

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
        Schema::dropIfExists('learning_outcome_quizzes');
    }
}
