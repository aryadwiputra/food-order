<?php
namespace Database\Seeders;

use App\Models\Category;
use App\Models\MenuItem;
use App\Models\MenuVariant;
use App\Models\MenuVariantPrice;
use App\Models\Outlet;
use App\Models\Tenant;
use Illuminate\Database\Seeder;

class SampleMenuSeeder extends Seeder
{
    public function run(): void
    {
        $tenant = Tenant::first();
        $outlet = Outlet::first();

        $category = Category::create([
            'tenant_id'  => $tenant->id,
            'outlet_id'  => $outlet->id,
            'name'       => 'Beverages',
            'sort_order' => 1,
            'is_active'  => true,
        ]);

        $item = MenuItem::create([
            'tenant_id'    => $tenant->id,
            'category_id'  => $category->id,
            'sku'          => 'BEV001',
            'name'         => 'Iced Coffee',
            'description'  => 'Freshly brewed coffee with ice.',
            'is_active'    => true,
            'is_available' => true,
        ]);

        $variant = MenuVariant::create([
            'tenant_id'    => $tenant->id,
            'menu_item_id' => $item->id,
            'name'         => 'Regular',
            'base_price'   => 20000,
            'is_active'    => true,
        ]);

        MenuVariantPrice::create([
            'tenant_id'       => $tenant->id,
            'outlet_id'       => $outlet->id,
            'menu_variant_id' => $variant->id,
            'price'           => 20000,
            'is_active'       => true,
        ]);
    }
}
