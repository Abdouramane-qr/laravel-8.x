<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('article');
            $table->integer('quantite');
            $table->float('price');
            $table->float('solde');
            $table->string('adresse');
            $table->string('telephone');
            $table->string('email');
            $table->foreign('recette_id')->references('id')->on('commandes')->onDelete('cascade');
            $table->unsignedBigInteger('recette_id');
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
        Schema::drop('commande');
    }
}
