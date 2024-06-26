<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('divisi'); 
            $table->text('detail')->nullable();
            $table->string('aksi')->default('Menunggu Tindakan');
            $table->unsignedBigInteger('assigned_to')->nullable();
            $table->timestamps();

            $table->foreign('assigned_to')
                  ->references('id')
                  ->on('karyawans')
                  ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reports');
    }
};
