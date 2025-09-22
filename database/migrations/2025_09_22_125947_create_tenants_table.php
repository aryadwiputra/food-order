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
        Schema::create('tenants', function (Blueprint $t) {
            $t->bigIncrements('id');
            $t->string('name', 150);
            $t->string('code', 50)->unique();
            $t->string('timezone', 64)->default('Asia/Jakarta');
            $t->string('currency', 8)->default('IDR');
            $t->boolean('is_active')->default(true);
            $t->string('billing_plan', 50)->nullable();
            $t->dateTime('expired_at')->nullable();
            $t->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};
