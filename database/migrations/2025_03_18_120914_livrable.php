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
        schema::create('Livrable',function(Blueprint $table){
            $table->increments('id');
            $table->string('Titre');
            $table->string('Description');
            $table->string('Lien Github');
            $table->Integer('participant_id')->unsigned();
            $table->foreign('participant_id')->references('id')->on('Utilisateurs');
            $table->timestamps();
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
