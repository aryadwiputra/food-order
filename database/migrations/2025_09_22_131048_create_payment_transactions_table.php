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
        Schema::create('payment_transactions', function (Blueprint $t) {
            $t->bigIncrements('id');
            $t->foreignId('tenant_id')->constrained()->cascadeOnDelete();
            $t->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $t->foreignId('payment_id')->nullable()->constrained('payments')->nullOnDelete();
            $t->string('provider', 30)->default('midtrans');
            $t->string('provider_order_id', 100);
            $t->string('transaction_id', 100)->nullable();
            $t->string('status', 30);
            $t->json('payload');
            $t->string('signature', 255)->nullable();
            $t->dateTime('occurred_at');
            $t->timestamps();
            $t->unique(['tenant_id', 'provider', 'provider_order_id']);
            $t->index(['tenant_id', 'order_id', 'status', 'occurred_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_transactions');
    }
};
