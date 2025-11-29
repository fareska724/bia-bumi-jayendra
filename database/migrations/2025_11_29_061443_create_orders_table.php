<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->string('order_code')->unique();        // Kode pesanan, mis: ORD-20241130-001
            $table->foreignId('customer_id')->constrained('customers');
            $table->foreignId('fleet_id')->nullable()->constrained('fleets');

            $table->unsignedInteger('total_items')->default(0);
            $table->unsignedBigInteger('total_price')->default(0);

            $table->enum('status', [
                'pending',      // baru masuk
                'confirmed',    // sudah di-approve admin
                'on_delivery',  // sedang dikirim
                'completed',    // selesai
                'cancelled',    // batal
            ])->default('pending');

            $table->string('shipping_address');
            $table->text('note')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
