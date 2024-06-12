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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pemesanan_id')->constrained('pemesanans')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('wallet_id')->constrained('wallets')->onUpdate('cascade')->onDelete('restrict');
            $table->date('tanggal_bayar');
            $table->string('bukti_bayar');
            $table->enum('status_pembayaran',['Lunas','Menunggu Verifikasi']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
