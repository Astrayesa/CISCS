<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurriculumCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curriculum_courses', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("curriculum_id");
            $table->foreign("curriculum_id")->on("curricula")->references("id");
            $table->unsignedBigInteger("course_id");
            $table->foreign("course_id")->on("courses")->references("id");

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
        Schema::dropIfExists('curriculum_courses');
    }
}
