<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctorants', function (Blueprint $table) {
            $table->id();
            $table->string('CIN_D');
            $table->integer('CNE_D');
            $table->string('Nom_D');
            $table->string('Prenom_D');
            $table->string('Email_D');
            $table->date('Date_Naiss_D');
            $table->string('Lieu_Naiss_D');
            $table->unsignedBigInteger('Id_Equipe');
            $table->timestamps();
            
            $table->foreign('Id_Equipe')->references('id')->on('equipes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctorants');
    }
};
