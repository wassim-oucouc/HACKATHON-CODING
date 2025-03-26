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
        schema::create('Equipe',function(Blueprint $table){
            $table->increments('id');
            $table->string('Nom');
            $table->string('Description');
            $table->Integer('Created_by_id')->unsigned();
            $table->string('status');
            $table->timestamps();
            $table->foreign('Created_by_id')->references('id')->on('Utilisateurs');
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
