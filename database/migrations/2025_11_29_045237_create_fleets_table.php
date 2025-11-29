<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fleets', function (Blueprint $table) {
            $table->id();

            $table->string('name');                     // Nama armada (Pickup, Dumptruck, Tronton)
            $table->string('code')->unique();           // Kode unik: pickup, dumptruck, tronton
            $table->string('size')->nullable();         // Kecil / Sedang / Besar

            $table->unsignedInteger('price_per_km');    // Harga per km (Rp)
            $table->decimal('capacity_m3', 8, 2);       // Kapasitas angkut (m³)

            $table->text('description')->nullable();    // Deskripsi opsional
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fleets');
    }
};
