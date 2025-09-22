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
        Schema::create('tables', function (Blueprint $t) {
            $t->bigIncrements('id');
            $t->foreignId('tenant_id')->constrained()->cascadeOnDelete();
            $t->foreignId('outlet_id')->constrained('outlets')->cascadeOnDelete();
            $t->string('name', 50);
            $t->string('code', 50);
            $t->tinyInteger('capacity')->default(0);
            $t->string('qr_token', 64)->unique();
            $t->boolean('is_active')->default(true);
            $t->timestamps();
            $t->unique(['tenant_id', 'outlet_id', 'code']);
            $t->index(['tenant_id', 'outlet_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tables');
    }
};
