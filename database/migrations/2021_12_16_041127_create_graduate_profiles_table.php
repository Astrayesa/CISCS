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

            $table->string("code");
            $table->string("title_en");
            $table->string("title_id");
            $table->string("aspect");


            $table->unsignedBigInteger("curriculum_id");
            $table->foreign("curriculum_id")->on("curricula")->references("id");

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
        Schema::dropIfExists('graduate_profiles');
    }
}
