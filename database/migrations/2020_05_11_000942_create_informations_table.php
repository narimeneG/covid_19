<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre')->nullable();
            $table->string('contenu',500)->nullable();
            $table->string('lien')->nullable();
            $table->string('image')->nullable();
            $table->date('date')->nullable();
            $table->unsignedInteger('sou_id')->nullable();
            $table->foreign('sou_id')->references('id')->on('sources')->onDelete('cascade');
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
        Schema::dropIfExists('informations');
    }
}
