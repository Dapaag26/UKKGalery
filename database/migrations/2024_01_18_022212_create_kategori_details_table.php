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
        Schema::create('katergori_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_photo');
            $table->unsignedBigInteger('id_kategori');
            $table->timestamps();

            $table->foreign('id_photo')->references('id')->on('photos');
            $table->foreign('id_kategori')->references('id')->on('kategoris');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('katergori_details');
    }
};
