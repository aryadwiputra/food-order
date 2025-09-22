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
        Schema::create('webhook_logs', function (Blueprint $t) {
            $t->bigIncrements('id');
            $t->foreignId('tenant_id')->nullable()->constrained('tenants')->nullOnDelete();
            $t->string('provider', 30);
            $t->string('event', 50)->nullable();
            $t->integer('status_code')->default(0);
            $t->string('signature', 255)->nullable();
            $t->json('payload');
            $t->boolean('handled')->default(false);
            $t->string('error_message', 255)->nullable();
            $t->dateTime('received_at');
            $t->timestamps();
            $t->index(['provider', 'received_at']);
            $t->index(['tenant_id', 'provider', 'handled']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('webhook_logs');
    }
};
