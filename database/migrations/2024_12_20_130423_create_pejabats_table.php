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
        Schema::create('pejabat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_jabatan')->constrained('jabatan')->cascadeOnDelete();
            $table->string('nama');
            $table->string('periode_jabatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pejabat');
    }
};
