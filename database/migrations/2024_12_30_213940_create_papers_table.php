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
        Schema::create('papers', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('autores');
            $table->string('publisher');
            $table->text('descripcion');
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
        Schema::dropIfExists('papers');
    }
};
