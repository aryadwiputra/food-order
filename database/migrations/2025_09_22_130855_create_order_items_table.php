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
        Schema::create('order_items', function (Blueprint $t) {
            $t->bigIncrements('id');
            $t->foreignId('tenant_id')->constrained()->cascadeOnDelete();
            $t->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $t->foreignId('menu_item_id')->constrained('menu_items')->cascadeOnDelete();
            $t->foreignId('menu_variant_id')->nullable()->constrained('menu_variants')->nullOnDelete();
            $t->string('name_snapshot', 150);
            $t->string('variant_snapshot', 100)->nullable();
            $t->integer('qty');
            $t->decimal('price', 12, 2);
            $t->decimal('total', 12, 2);
            $t->string('note', 255)->nullable();
            $t->foreignId('kitchen_station_id')->nullable()->constrained('kitchen_stations')->nullOnDelete();
            $t->timestamps();
            $t->index(['tenant_id', 'order_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
