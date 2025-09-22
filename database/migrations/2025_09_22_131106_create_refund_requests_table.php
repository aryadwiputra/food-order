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
        Schema::create('refund_requests', function (Blueprint $t) {
            $t->bigIncrements('id');
            $t->foreignId('tenant_id')->constrained()->cascadeOnDelete();
            $t->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $t->foreignId('payment_id')->constrained('payments')->cascadeOnDelete();
            $t->text('reason');
            $t->decimal('amount', 12, 2);
            $t->enum('status', ['requested', 'approved', 'rejected', 'processed'])->default('requested');
            $t->foreignId('requested_by')->constrained('users')->cascadeOnDelete();
            $t->foreignId('processed_by')->nullable()->constrained('users')->nullOnDelete();
            $t->dateTime('processed_at')->nullable();
            $t->timestamps();
            $t->index(['tenant_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refund_requests');
    }
};
