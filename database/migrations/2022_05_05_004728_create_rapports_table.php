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
        Schema::create('rapports', function (Blueprint $table) {
            $table->id();
            $table->string('name_responsible');
            $table->string('email_responsible');
            $table->unsignedBigInteger('id_team');
            $table->string('description_message');
            $table->string('file_rapport');
            $table->timestamps();

            $table->foreign('id_team')->references('id')->on('equipes'); 
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rapports');
    }
};
