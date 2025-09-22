<?php
namespace Database\Factories;

use App\Models\Ingredient;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class IngredientFactory extends Factory
{
    protected $model = Ingredient::class;

    public function definition(): array
    {
        return [
            'tenant_id' => Tenant::factory(),
            'sku'       => strtoupper(Str::random(6)),
            'name'      => $this->faker->word,
            'unit'      => $this->faker->randomElement(['gr', 'ml', 'pcs']),
            'min_stock' => 100,
            'is_active' => true,
        ];
    }
}
