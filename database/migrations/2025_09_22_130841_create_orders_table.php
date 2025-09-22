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
        Schema::create('orders', function (Blueprint $t) {
            $t->bigIncrements('id');
            $t->foreignId('tenant_id')->constrained()->cascadeOnDelete();
            $t->foreignId('outlet_id')->constrained('outlets')->cascadeOnDelete();
            $t->foreignId('table_id')->nullable()->constrained('tables')->nullOnDelete();
            $t->string('code', 50);
            $t->enum('channel', ['qr', 'pos']);
            $t->enum('type', ['dine_in', 'takeaway']);
            $t->string('customer_name')->nullable();
            $t->string('customer_email')->nullable();
            $t->string('customer_phone', 30)->nullable();
            $t->decimal('subtotal', 12, 2)->default(0);
            $t->decimal('tax', 12, 2)->default(0);
            $t->decimal('service', 12, 2)->default(0);
            $t->decimal('discount', 12, 2)->default(0);
            $t->decimal('total', 12, 2)->default(0);
            $t->enum('status', ['draft', 'pending_payment', 'paid', 'sent_to_kitchen', 'in_progress', 'ready', 'served', 'closed', 'canceled'])->default('draft');
            $t->text('notes')->nullable();
            $t->dateTime('paid_at')->nullable();
            $t->dateTime('closed_at')->nullable();
            $t->foreignId('cashier_id')->nullable()->constrained('users')->nullOnDelete();
            $t->foreignId('waiter_id')->nullable()->constrained('users')->nullOnDelete();
            $t->timestamps();
            $t->index(['tenant_id', 'outlet_id', 'status', 'created_at']);
            $t->index(['tenant_id', 'paid_at']);
            $t->unique(['outlet_id', 'code']);
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
