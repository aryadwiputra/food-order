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
        Schema::create('payments', function (Blueprint $t) {
            $t->bigIncrements('id');
            $t->foreignId('tenant_id')->constrained()->cascadeOnDelete();
            $t->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $t->enum('method', ['cash', 'qris', 'midtrans_cc', 'midtrans_qris', 'other']);
            $t->decimal('amount', 12, 2);
            $t->enum('status', ['pending', 'paid', 'failed', 'refunded'])->default('pending');
            $t->dateTime('paid_at')->nullable();
            $t->string('reference_no', 100)->nullable();
            $t->timestamps();
            $t->index(['tenant_id', 'order_id']);
            $t->index(['tenant_id', 'status', 'paid_at']);
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
