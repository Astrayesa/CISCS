<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseLearningOutcomeEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_learning_outcome_evaluations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("CLO_id");
            $table->foreign("CLO_id")->on("course_learning_outcomes")->references("id");
            $table->unsignedBigInteger("evaluation_id");
            $table->foreign("evaluation_id")->on("evaluations")->references("id");

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
        Schema::dropIfExists('couse_learning_outcome_evaluations');
    }
}
