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
        schema::create('inscription_equipe',function(Blueprint $table){
            $table->increments('id');
            $table->integer('equipe_id')->unsigned();
            $table->integer('participant_id')->unsigned();
            $table->foreign('equipe_id')->references('id')->on('equipe');
            $table->foreign('participant_id')->references('id')->on('Utilisateurs');
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
