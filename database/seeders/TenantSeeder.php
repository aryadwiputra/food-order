<?php
namespace Database\Seeders;

use App\Models\Outlet;
use App\Models\Tenant;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    public function run(): void
    {
        $tenant = Tenant::create([
            'name'      => 'Demo Resto',
            'code'      => 'demo_resto',
            'timezone'  => 'Asia/Jakarta',
            'currency'  => 'IDR',
            'is_active' => true,
        ]);

        Outlet::create([
            'tenant_id'              => $tenant->id,
            'name'                   => 'Outlet Utama',
            'code'                   => 'outlet_utama',
            'address'                => 'Jl. Contoh No. 123',
            'phone'                  => '081234567890',
            'tax_percent'            => 10,
            'service_charge_percent' => 5,
            'is_active'              => true,
        ]);
    }
}
