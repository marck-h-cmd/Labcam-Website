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
        Schema::create('patentes', function (Blueprint $table) {
            $table->id();
            $table->string('titulo',200);
            $table->json('autores');
            $table->text('descripcion');
            $table->foreignId('area_id')->constrained('areas_investigacion')->onDelete('cascade');
            $table->string('doi',100);
            $table->date('fecha_publicacion');
            $table->string('pdf_filename')->nullable();
            $table->string('img_filename')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patentes');
    }
};
