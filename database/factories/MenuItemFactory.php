<?php
namespace Database\Factories;

use App\Models\Category;
use App\Models\MenuItem;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuItemFactory extends Factory
{
    protected $model = MenuItem::class;

    public function definition(): array
    {
        return [
            'tenant_id'    => Tenant::factory(),
            'category_id'  => Category::factory(),
            'sku'          => strtoupper($this->faker->lexify('SKU???')),
            'name'         => $this->faker->words(2, true),
            'description'  => $this->faker->sentence,
            'is_active'    => true,
            'is_available' => true,
        ];
    }
}
