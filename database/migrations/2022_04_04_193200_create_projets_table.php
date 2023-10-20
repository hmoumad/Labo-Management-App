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
        Schema::create('projets', function (Blueprint $table) {
            $table->id();
            $table->string('Intitul_Projet');
            $table->string('Description_Projet');
            $table->string('Img_Projet')->nullable();
            $table->unsignedBigInteger('Id_Theme');
            $table->timestamps();

            $table->foreign('Id_Theme')->references('id')->on('themes');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projets');
    }
};
