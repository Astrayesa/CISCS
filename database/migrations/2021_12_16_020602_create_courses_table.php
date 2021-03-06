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

            $table->string("code", 20);
            $table->string("title_en", 100);
            $table->string("title_id", 100) ;
            $table->string("desc_en");
            $table->string("desc_id");

            $table->unsignedTinyInteger("semester");
            $table->unsignedTinyInteger("theory_credit")->default(0);
            $table->unsignedTinyInteger("non_theory_credit")->default(0);

            $table->unsignedBigInteger("curriculum_id");
            $table->foreign("curriculum_id")->on("curricula")->references("id");

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
        Schema::dropIfExists('courses');
    }
}
