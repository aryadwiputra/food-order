<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentTransaction extends Model
{
    protected $fillable = ['tenant_id', 'order_id', 'payment_id', 'provider', 'provider_order_id', 'transaction_id', 'status', 'payload', 'signature', 'occurred_at'];
    protected $casts    = ['payload' => 'array'];
}
