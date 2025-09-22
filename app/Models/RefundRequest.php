<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RefundRequest extends Model
{
    protected $fillable = ['tenant_id', 'order_id', 'payment_id', 'reason', 'amount', 'status', 'requested_by', 'processed_by', 'processed_at'];
}
