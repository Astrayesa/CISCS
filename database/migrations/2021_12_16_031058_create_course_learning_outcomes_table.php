<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseLearningOutcomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_learning_outcomes', function (Blueprint $table) {
            $table->id();

            $table->string("title_en");
            $table->string("title_id");
            $table->string("desc_en");
            $table->string("desc_id");
            $table->double("percent_to_graduate_LO");

            $table->unsignedBigInteger("lesson_plan_id");
            $table->foreign("lesson_plan_id")->on("lesson_plans")->references("id");
            $table->unsignedBigInteger("LO_id");
            $table->foreign("LO_id")->on("learning_outcomes")->references("id");

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('couse_learning_outcomes');
    }
}
