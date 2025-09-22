<?php
namespace Database\Factories;

use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TenantFactory extends Factory
{
    protected $model = Tenant::class;

    public function definition(): array
    {
        return [
            'name'      => $this->faker->company . ' Resto',
            'code'      => Str::slug($this->faker->unique()->company),
            'timezone'  => 'Asia/Jakarta',
            'currency'  => 'IDR',
            'is_active' => true,
        ];
    }
}
