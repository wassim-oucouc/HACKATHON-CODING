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
        schema::create('Utilisateurs',function(Blueprint $table){
            $table->increments('id');
            $table->string('Prenom');
            $table->string('Nom');
            $table->string('Email');
            $table->string('Password');
            $table->string('Photo');
            $table->integer('Role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('Role');
            $table->string('status');
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
