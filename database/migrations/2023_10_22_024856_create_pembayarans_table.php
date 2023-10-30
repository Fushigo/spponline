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
            $table->id('id_pembayaran');
            $table->date('tgl_bayar');
            $table->string('bulan_bayar');
            $table->string('tahun_bayar');
            $table->enum("status", [
                "Unpaid", "Paid"
            ])->dafault('Unpaid');
            $table->foreignId('id_siswa');
            $table->foreignId('id_petugas');
            $table->foreignId('id_spp');
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
