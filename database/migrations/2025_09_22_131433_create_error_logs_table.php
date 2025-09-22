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
        Schema::create('error_logs', function (Blueprint $t) {
            $t->bigIncrements('id');
            $t->foreignId('tenant_id')->nullable()->constrained('tenants')->nullOnDelete();
            $t->string('message', 255);
            $t->json('context')->nullable();
            $t->longText('trace')->nullable();
            $t->dateTime('occurred_at');
            $t->timestamps();
            $t->index(['tenant_id', 'occurred_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('error_logs');
    }
};
