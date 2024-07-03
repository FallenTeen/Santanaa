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
        Schema::create('kamars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipe_kamar_id')->constrained('tipe_kamars')->onDelete('cascade');
            $table->foreignId('status_kamar_id')->constrained('status_kamars')->onDelete('cascade');
            $table->string('nomor')->nullable();
            $table->integer('lantai')->nullable();
            $table->integer('kapasitas')->nullable();
            $table->decimal('harga', 10, 2)->nullable();
            $table->text('deskripsi_singkat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamar');
    }
};
