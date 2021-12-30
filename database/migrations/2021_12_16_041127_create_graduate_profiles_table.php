<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGraduateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graduate_profiles', function (Blueprint $table) {
            $table->id();

            $table->string("code", 20);
            $table->string("title_en", 100);
            $table->string("title_id", 100);
            $table->string("aspect", 50);


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
        Schema::dropIfExists('graduate_profiles');
    }
}
