<?php
namespace Database\Factories;

use App\Models\Order;
use App\Models\Outlet;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'tenant_id'      => Tenant::factory(),
            'outlet_id'      => Outlet::factory(),
            'code'           => strtoupper(Str::random(8)),
            'channel'        => 'qr',
            'type'           => 'dine_in',
            'customer_name'  => $this->faker->name,
            'customer_email' => $this->faker->safeEmail,
            'customer_phone' => $this->faker->phoneNumber,
            'subtotal'       => 20000,
            'tax'            => 2000,
            'service'        => 1000,
            'discount'       => 0,
            'total'          => 23000,
            'status'         => 'draft',
        ];
    }
}
