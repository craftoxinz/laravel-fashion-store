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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->string('payment_code')->unique();
            $table->string('order_code');

            $table->decimal('amount', 12, 2);

            $table->enum('method', [
                'cash',
                'bank_transfer',
                'e_wallet',
                'credit_card',
                'debit_card',
            ]);

            $table->enum('status', [
                'pending',
                'paid',
                'failed',
                'cancelled',
            ]);

            $table->timestamp('paid_at')->nullable();
            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};