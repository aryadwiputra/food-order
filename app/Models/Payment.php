<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['tenant_id', 'order_id', 'method', 'amount', 'status', 'paid_at', 'reference_no'];
    public function order()
    {return $this->belongsTo(Order::class);}
}
