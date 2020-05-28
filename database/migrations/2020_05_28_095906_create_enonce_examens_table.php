<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnonceExamensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enonce_examens', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('slug');
            $table->string('document');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('examen_id');
            $table->unsignedBigInteger('matiere_id');
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
        Schema::dropIfExists('enonce_examens');
    }
}
