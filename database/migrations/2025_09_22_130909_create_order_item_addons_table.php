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
        Schema::create('order_item_addons', function (Blueprint $t) {
            $t->bigIncrements('id');
            $t->foreignId('tenant_id')->constrained()->cascadeOnDelete();
            $t->foreignId('order_item_id')->constrained('order_items')->cascadeOnDelete();
            $t->foreignId('menu_addon_id')->nullable()->constrained('menu_addons')->nullOnDelete();
            $t->string('addon_name_snapshot', 150);
            $t->decimal('price', 12, 2);
            $t->integer('qty')->default(1);
            $t->decimal('total', 12, 2);
            $t->timestamps();
            $t->index(['tenant_id', 'order_item_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_item_addons');
    }
};
