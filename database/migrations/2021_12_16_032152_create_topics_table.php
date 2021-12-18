<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->id();

            $table->string("title_en");
            $table->string("title_id");
            $table->text("indicator");
            $table->unsignedTinyInteger("start_week");
            $table->unsignedTinyInteger("end_week");
            $table->string("learning_method");
            $table->double("percent_to_LO");

            $table->unsignedBigInteger("CLO_id");
            $table->foreign("CLO_id")->on("course_learning_outcomes")->references("id");

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
        Schema::dropIfExists('topics');
    }
}
