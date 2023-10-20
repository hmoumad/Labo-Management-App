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
        Schema::create('chercheurs', function (Blueprint $table) {
            $table->id();
            $table->string('CIN_CH');
            $table->integer('CNE_CH');
            $table->string('Nom_CH');
            $table->string('Prenom_CH');
            $table->string('Email_CH');
            $table->date('Date_Naiss_CH');
            $table->string('Lieu_Naiss_CH');
            $table->unsignedBigInteger('Id_Equipe');
            $table->unsignedBigInteger('Id_Lab');
            $table->timestamps();

            $table->foreign('Id_Equipe')->references('id')->on('equipes');
            $table->foreign('Id_Lab')->references('id')->on('laboratoires');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chercheurs');
    }
};
