<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSomestre extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('somestre', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('libelle');
           
            $table->unsignedBigInteger('id_filliere');
            $table->foreign('id_filliere')->references('id')->on('filliere');
            
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
        Schema::dropIfExists('somestre');
    }
}
