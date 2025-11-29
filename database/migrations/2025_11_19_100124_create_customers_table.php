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
    Schema::create('customers', function (Blueprint $table) {
        $table->id();

        // Koneksi ke users
        $table->foreignId('user_id')->constrained()->onDelete('cascade');

        // Data wajib customer
        $table->string('first_name');
        $table->string('last_name');
        $table->date('birth_date');
        $table->string('phone', 20);
        $table->text('address');

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
