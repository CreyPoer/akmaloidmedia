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
        Schema::create('pakets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_produk_id')->constrained('kategori_produks')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('penerbit_id')->constrained('penerbits')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('periode_id')->constrained('periodes')->onUpdate('cascade')->onDelete('restrict');
            $table->string('name');
            $table->enum('waktu_pengiriman',['Pagi', 'Siang','Sore']);
            $table->integer('harga_paket');
            $table->text('deskripsi');
            $table->string('gambar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pakets');
    }
};
