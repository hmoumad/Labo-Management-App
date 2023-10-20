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
        Schema::create('condidats', function (Blueprint $table) {
            $table->id();
            $table->string('CIN_C');
            $table->integer('CNE_C');
            $table->string('Nom_C');
            $table->string('Prenom_C');
            $table->string('Email_C');
            $table->date('Date_Naiss_C');
            $table->string('Lieu_Naiss_C');
            $table->double('Note_Deug');
            $table->double('Note_Licence');
            $table->double('Note_Entretien');
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
        Schema::dropIfExists('condidats');
    }
};
