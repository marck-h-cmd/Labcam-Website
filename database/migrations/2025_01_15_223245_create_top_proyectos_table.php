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
        Schema::create('top_proyectos', function (Blueprint $table) {
            $table->id(); // ID autoincremental
            $table->string('img1'); // Imagen 1
            $table->string('img2'); // Imagen 2
            $table->text('descripcion'); // Descripción
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('top_proyectos');
    }
};
