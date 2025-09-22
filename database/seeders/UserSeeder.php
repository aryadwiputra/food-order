<?php
namespace Database\Seeders;

use App\Models\Outlet;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $tenant = Tenant::first();
        $outlet = Outlet::first();

        $user = User::firstOrCreate([
            'email' => 'owner@demo.com',
        ], [
            'name'     => 'Owner Demo',
            'password' => Hash::make('password'),
        ]);

        $user->assignRole('Owner');

// Attach to tenant & outlet
        $user->tenants()->attach($tenant->id, ['is_default' => true]);
        $user->outlets()->attach($outlet->id);
    }
}
