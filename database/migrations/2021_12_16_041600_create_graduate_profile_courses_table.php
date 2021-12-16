<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGraduateProfileCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graduate_profile_courses', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("graduate_profile_id");
            $table->foreign("graduate_profile_id")->on("graduate_profiles")->references("id");
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
        Schema::dropIfExists('graduate_profile_courses');
    }
}
