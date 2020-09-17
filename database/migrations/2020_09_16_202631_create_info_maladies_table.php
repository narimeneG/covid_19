<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoMaladiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_maladies', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('mal_id')->nullable();
            $table->foreign('mal_id')->references('id')->on('maladies')->onDelete('cascade');
            $table->unsignedInteger('info_id')->nullable();
            $table->foreign('info_id')->references('id')->on('informations')->onDelete('cascade');
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
        Schema::dropIfExists('info_maladies');
    }
}
