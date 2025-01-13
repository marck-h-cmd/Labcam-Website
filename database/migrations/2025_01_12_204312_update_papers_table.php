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
        Schema::table('papers', function (Blueprint $table) {
            $table->string('titulo')->unique()->change();
            $table->string('doi')->unique()->change();
            $table->dropColumn('area');

            $table->foreignId('area_id')->after('descripcion')->constrained('areas_investigacion')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('papers', function (Blueprint $table) {
            $table->string('titulo')->dropUnique()->change();
            $table->string('doi')->dropUnique()->change();
            $table->dropForeign(['area_id']);
            $table->dropColumn('area_id');
        });
    }
};
