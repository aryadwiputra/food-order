<?php
namespace Database\Factories;

use App\Models\MenuItem;
use App\Models\MenuVariant;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuVariantFactory extends Factory
{
    protected $model = MenuVariant::class;

    public function definition(): array
    {
        return [
            'tenant_id'    => Tenant::factory(),
            'menu_item_id' => MenuItem::factory(),
            'name'         => $this->faker->randomElement(['Hot', 'Iced', 'Regular', 'Large']),
            'base_price'   => $this->faker->numberBetween(10000, 50000),
            'is_active'    => true,
        ];
    }
}
