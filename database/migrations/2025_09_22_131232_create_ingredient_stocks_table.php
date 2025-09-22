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
        Schema::create('ingredient_stocks', function (Blueprint $t) {
            $t->bigIncrements('id');
            $t->foreignId('tenant_id')->constrained()->cascadeOnDelete();
            $t->foreignId('outlet_id')->constrained('outlets')->cascadeOnDelete();
            $t->foreignId('ingredient_id')->constrained('ingredients')->cascadeOnDelete();
            $t->decimal('qty_on_hand', 14, 3)->default(0);
            $t->timestamps();
            $t->unique(['tenant_id', 'outlet_id', 'ingredient_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredient_stocks');
    }
};
