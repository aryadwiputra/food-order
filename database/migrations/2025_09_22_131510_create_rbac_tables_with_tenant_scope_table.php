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
        Schema::create('roles', function (Blueprint $t) {
            $t->bigIncrements('id');
            $t->foreignId('tenant_id')->constrained()->cascadeOnDelete();
            $t->string('name');
            $t->string('guard_name');
            $t->boolean('is_system')->default(false);
            $t->timestamps();
            $t->unique(['tenant_id', 'name', 'guard_name']);
        });

        Schema::create('permissions', function (Blueprint $t) {
            $t->bigIncrements('id');
            $t->foreignId('tenant_id')->constrained()->cascadeOnDelete();
            $t->string('name');
            $t->string('guard_name');
            $t->timestamps();
            $t->unique(['tenant_id', 'name', 'guard_name']);
        });

        Schema::create('role_has_permissions', function (Blueprint $t) {
            $t->foreignId('permission_id')->constrained('permissions')->cascadeOnDelete();
            $t->foreignId('role_id')->constrained('roles')->cascadeOnDelete();
            $t->foreignId('tenant_id')->constrained('tenants')->cascadeOnDelete();
            $t->primary(['permission_id', 'role_id', 'tenant_id']);
        });

        Schema::create('model_has_roles', function (Blueprint $t) {
            $t->foreignId('role_id')->constrained('roles')->cascadeOnDelete();
            $t->morphs('model');
            $t->foreignId('tenant_id')->constrained('tenants')->cascadeOnDelete();
            $t->primary(['role_id', 'model_id', 'model_type', 'tenant_id']);
            $t->index(['model_id', 'model_type', 'tenant_id']);
        });

        Schema::create('model_has_permissions', function (Blueprint $t) {
            $t->foreignId('permission_id')->constrained('permissions')->cascadeOnDelete();
            $t->morphs('model');
            $t->foreignId('tenant_id')->constrained('tenants')->cascadeOnDelete();
            $t->primary(['permission_id', 'model_id', 'model_type', 'tenant_id']);
            $t->index(['model_id', 'model_type', 'tenant_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model_has_permissions');
        Schema::dropIfExists('model_has_roles');
        Schema::dropIfExists('role_has_permissions');
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('roles');
    }
};
