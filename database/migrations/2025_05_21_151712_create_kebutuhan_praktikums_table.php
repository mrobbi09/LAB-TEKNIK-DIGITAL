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
        Schema::create('kebutuhan_praktikum', function (Blueprint $table) {
            $table->uuid('id_kbp')->primary();
            $table->string('slug', 255)->unique();
            $table->string('lembar_asistensi', 255);
            $table->string('lembar_tp', 255);
            $table->string('format_margin', 255);
            $table->string('format_laprak', 255);
            $table->string('format_absen', 255);
            $table->string('link_software', 255)->nullable();
            $table->uuid('id_praktikum');
            $table->foreign('id_praktikum')->references('id_praktikum')->on('praktikum')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kebutuhan_praktikums');
    }
};
