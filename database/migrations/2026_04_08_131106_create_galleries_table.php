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
        Schema::create('galleries', function (Blueprint $table) {
            // Menggunakan increments() untuk tipe data INT (4 byte)
            $table->increments('id');

            // Image dibatasi varchar(20)
            $table->string('image', 20); 

            // Caption dibatasi varchar(30)
            $table->string('caption', 30)->nullable(); 

            $table->boolean('is_visible')->default(true); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};