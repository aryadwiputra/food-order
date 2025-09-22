<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['tenant_id', 'outlet_id', 'table_id', 'code', 'channel', 'type', 'customer_name', 'customer_email', 'customer_phone', 'subtotal', 'tax', 'service', 'discount', 'total', 'status', 'notes', 'paid_at', 'closed_at', 'cashier_id', 'waiter_id'];
    public function items()
    {return $this->hasMany(OrderItem::class);}
    public function payments()
    {return $this->hasMany(Payment::class);}
}
