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
        Schema::create('room_types', function (Blueprint $table) {
            // Menggunakan increments() untuk INT (4 byte)
            $table->increments('id');

            // Name dibatasi varchar(25) sesuai permintaan
            $table->string('name', 25);

            // Category wajib ada untuk filter di Controller
            $table->enum('category', ['kamar', 'bersama', 'parkir']);

            // Image dibatasi varchar(20) sesuai permintaan
            $table->string('image', 20);

            // Facilities tetap menggunakan TEXT
            $table->text('facilities');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_types');
    }
};