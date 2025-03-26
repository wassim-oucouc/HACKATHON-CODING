<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        schema::create('Hackathon',function(Blueprint $table){
            $table->increments('id');
            $table->string('Nom');
            $table->string('Théme');
            $table->integer('Organisateur_id')->unsigned();
            $table->string('Edition');
            $table->string('Lieu');
            $table->foreign('Organisateur_id')->references('id')->on('Utilisateurs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
