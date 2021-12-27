<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string("code", 20);
            $table->string("name_en", 100);
            $table->string("name_id", 100);
            $table->string("establishment_cert_num", 50);
            $table->string("accreditation_cert_num", 50);
            $table->string("accreditation_ranking", 4);
            $table->string("accreditation_file");

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
        Schema::dropIfExists('departments');
    }
}
