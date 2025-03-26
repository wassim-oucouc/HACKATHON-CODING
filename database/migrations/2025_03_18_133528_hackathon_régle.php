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
        schema::create('Hackathon_régle',function(Blueprint $table){
            $table->increments('id');
            $table->integer('Hackathon_id')->unsigned();
            $table->integer('régle_id')->unsigned();
            $table->foreign('Hackathon_id')->references('id')->on('Hackathon');
            $table->foreign('régle_id')->references('id')->on('Régle');
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
