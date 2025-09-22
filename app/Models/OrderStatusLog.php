<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderStatusLog extends Model
{
    protected $fillable = ['tenant_id', 'order_id', 'from_status', 'to_status', 'user_id', 'meta'];
    protected $casts    = ['meta' => 'array'];
}
