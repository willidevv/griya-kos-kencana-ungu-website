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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();

            // Nomor telepon biasanya berkisar antara 10-15 karakter. 
            // 20 karakter sudah sangat aman untuk format internasional (+62...).
            $table->string('phone', 13);

            // Maps Iframe menggunakan text karena string iframe dari Google Maps 
            // sangat panjang dan bisa mencapai ribuan karakter.
            $table->text('maps_iframe');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};