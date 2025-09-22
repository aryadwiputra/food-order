<?php
namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $tenant = Tenant::first();

        $permissions = [
            'order.create', 'order.update', 'order.cancel', 'order.pay', 'order.close',
            'menu.create', 'menu.update', 'menu.toggle', 'menu.price_update',
            'stock.adjust', 'stock.view', 'recipe.update',
            'kds.view', 'kds.update', 'report.view', 'report.export',
            'user.manage', 'role.manage',
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate([
                'tenant_id'  => $tenant->id,
                'name'       => $perm,
                'guard_name' => 'web',
            ]);
        }

        $roles = [
            'Owner'   => $permissions,
            'Manager' => ['order.create', 'order.update', 'order.pay', 'order.close', 'menu.create', 'menu.update', 'menu.toggle', 'stock.adjust', 'stock.view', 'report.view', 'report.export'],
            'Kasir'   => ['order.create', 'order.pay', 'order.close'],
            'Chef'    => ['kds.view', 'kds.update'],
            'Waiter'  => ['order.create', 'order.update', 'order.close'],
        ];

        foreach ($roles as $role => $perms) {
            $r = Role::firstOrCreate([
                'tenant_id'  => $tenant->id,
                'name'       => $role,
                'guard_name' => 'web',
            ]);
            $r->syncPermissions($perms);
        }
    }
}
