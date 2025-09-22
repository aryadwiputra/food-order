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
        Schema::create('menu_items', function (Blueprint $t) {
            $t->bigIncrements('id');
            $t->foreignId('tenant_id')->constrained()->cascadeOnDelete();
            $t->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            $t->string('sku', 64)->nullable();
            $t->string('name');
            $t->text('description')->nullable();
            $t->string('image_url')->nullable();
            $t->boolean('is_active')->default(true);
            $t->boolean('is_available')->default(true);
            $t->timestamps();
            $t->index(['tenant_id', 'category_id']);
            $t->index(['tenant_id', 'is_active', 'is_available']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};
