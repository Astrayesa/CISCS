<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();

            $table->string("code");
            $table->string("title_en");
            $table->string("title_id");
            $table->string("desc_en");
            $table->string("desc_id");

            $table->unsignedTinyInteger("semester");
            $table->unsignedTinyInteger("theory_credit");
            $table->unsignedTinyInteger("non_theory_credit");

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
        Schema::dropIfExists('courses');
    }
}
