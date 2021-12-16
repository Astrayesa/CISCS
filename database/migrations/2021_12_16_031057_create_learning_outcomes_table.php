<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearningOutcomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learning_outcomes', function (Blueprint $table) {
            $table->id();

            $table->string("title_en");
            $table->string("title_id");
            $table->string("desc_en");
            $table->string("desc_id");
            $table->double("percent_to_graduate_LO");

            $table->unsignedBigInteger("lesson_plan_id");
            $table->foreign("lesson_plan_id")->on("lesson_plans")->references("id");

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
        Schema::dropIfExists('learning_outcomes');
    }
}
