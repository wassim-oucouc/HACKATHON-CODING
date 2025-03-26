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
        schema::create('Feedback',function(Blueprint $table){
            $table->increments('id');
            $table->Float('Note');
            $table->string('Commentaire');
            $table->integer('Livrable_id')->unsigned();
            $table->Integer('Jury_id')->unsigned();
            $table->foreign('Livrable_id')->references('id')->on('Livrable');
            $table->foreign('Jury_id')->references('id')->on('Utilisateurs');
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
