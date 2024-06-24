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
      

        Schema::create('tkamar', function (Blueprint $table) {
            $table->id('id_kamar');
            $table->string('tipe_kamar');
            $table->string('lantai');
            $table->boolean('smoking');
            $table->double('hargapermalam');
            $table->string('ketersediaan')->nullable();
        });

        Schema::create('booking', function (Blueprint $table){
            $table->id('id_booking');
            $table->string('id_kamar');
            $table->string('id_visitor');
            $table->string('id_pesananmakanan')->nullable();
            $table->string('checkin')->nullable();
            $table->string('checkout')->nullable();
        });

        Schema::create('fnb_order', function (Blueprint $table){
            $table->id('id_pesananmakanan');
            $table->string('makanan')->nullable();
            $table->string('jml_makanan');
            $table->string('minuman')->nullable();
            $table->string('jml_minuman');
            $table->string('tambahan')->nullable();
            $table->string('jml_tambahan');
            $table->longText('pesan')->nullable();
            $table->string('waktu_diantar')->nullable();
            $table->string('total_harga')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tkamar');
        Schema::dropIfExists('booking');
        Schema::dropIfExists('fnborder');
    }
};
