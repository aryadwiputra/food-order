<?php
namespace Database\Factories;

use App\Models\Order;
use App\Models\Payment;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    public function definition(): array
    {
        return [
            'tenant_id' => Tenant::factory(),
            'order_id'  => Order::factory(),
            'method'    => 'cash',
            'amount'    => 23000,
            'status'    => 'paid',
            'paid_at'   => now(),
        ];
    }
}
