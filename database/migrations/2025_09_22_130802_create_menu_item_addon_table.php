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
        Schema::create('menu_item_addon', function (Blueprint $t) {
            $t->bigIncrements('id');
            $t->foreignId('tenant_id')->constrained()->cascadeOnDelete();
            $t->foreignId('menu_item_id')->constrained('menu_items')->cascadeOnDelete();
            $t->foreignId('menu_addon_id')->constrained('menu_addons')->cascadeOnDelete();
            $t->timestamps();
            $t->unique(['tenant_id', 'menu_item_id', 'menu_addon_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_item_addon');
    }
};
