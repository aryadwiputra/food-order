<?php
namespace Database\Factories;

use App\Models\Outlet;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OutletFactory extends Factory
{
    protected $model = Outlet::class;

    public function definition(): array
    {
        return [
            'tenant_id'              => Tenant::factory(),
            'name'                   => $this->faker->company . ' Outlet',
            'code'                   => Str::slug($this->faker->unique()->company),
            'address'                => $this->faker->address,
            'phone'                  => $this->faker->phoneNumber,
            'tax_percent'            => 10,
            'service_charge_percent' => 5,
            'is_active'              => true,
        ];
    }
}
