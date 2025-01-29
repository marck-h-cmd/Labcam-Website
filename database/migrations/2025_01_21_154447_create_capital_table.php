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
        Schema::create('capital', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->string('nombre');
            $table->string('carrera');
            $table->unsignedBigInteger('area_investigacion'); // Referencia a la tabla areas_investigacion
            $table->string('correo');
            $table->string("foto");
            $table->string('cv');
            $table->string("rol");
            $table->string('linkedin');
            $table->string('ctivitae');
            $table->timestamps();

            // Definimos la clave foránea
            $table->foreign('area_investigacion')->references('id')->on('areas_investigacion')->onDelete('cascade'); // Si se elimina un área, los registros asociados también se eliminan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capital');
    }
};


