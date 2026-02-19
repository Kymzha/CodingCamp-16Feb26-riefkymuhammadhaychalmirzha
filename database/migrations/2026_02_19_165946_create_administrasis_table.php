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
        Schema::create('administrasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained('pasiens')->onDelete('cascade');
            $table->foreignId('dokter_id')->constrained('dokters')->onDelete('cascade');
            $table->date('tanggal_periksa');
            $table->text('keluhan');
            $table->text('diagnosa')->nullable();
            $table->decimal('biaya', 10, 2)->default(0);
            $table->enum('status', ['Menunggu','Selesai','Batal'])->default('Menunggu');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administrasis');
    }
};
