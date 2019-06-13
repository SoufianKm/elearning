<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->string('libelle');
            $table->unsignedBigInteger('id_prof');
            $table->foreign('id_prof')->references('id')->on('professeur');
            $table->unsignedBigInteger('id_semestre');
            $table->foreign('id_semestre')->references('id')->on('somestre');
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
        Schema::dropIfExists('module');
    }
}

