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
        Schema::create('kitchen_tickets', function (Blueprint $t) {
            $t->bigIncrements('id');
            $t->foreignId('tenant_id')->constrained()->cascadeOnDelete();
            $t->foreignId('outlet_id')->constrained('outlets')->cascadeOnDelete();
            $t->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $t->foreignId('station_id')->constrained('kitchen_stations')->cascadeOnDelete();
            $t->enum('status', ['new', 'in_progress', 'ready', 'served', 'canceled'])->default('new');
            $t->string('ticket_no', 30)->nullable();
            $t->timestamps();
            $t->index(['tenant_id', 'outlet_id', 'station_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kitchen_tickets');
    }
};
