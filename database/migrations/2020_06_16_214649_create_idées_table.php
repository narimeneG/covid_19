<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdéesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('idées', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre');
            $table->string('contenu',500);
            $table->string('image')->nullable();
            $table->string('etat')->default('nouvelle');
            $table->date('date');
            $table->unsignedInteger('cat_id');
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedInteger('cit_id');
            $table->foreign('cit_id')->references('id')->on('citoyens')->onDelete('cascade');
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
        Schema::dropIfExists('idées');
    }
}
