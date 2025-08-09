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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('address_id')->constrained('addresses')->onDelete('cascade');
            $table->string('trx_id');
            $table->integer('subtotal');
            $table->integer('shipping_cost');
            $table->integer('total_cost');
            $table->enum('status', ['pending', 'paid', 'processing', 'delivered', 'expired',  'cancelled']);
            $table->enum('payment_method', ['bank_transfer', 'e_wallet']);
            $table->string('payment_name')->nullable();
            $table->string('payment_va')->nullable();
            $table->string('payment_ewallet')->nullable();
            $table->string('shipping_service')->nullable();
            $table->string('shipping_resi')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
