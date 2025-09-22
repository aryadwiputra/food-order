<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KitchenTicketLog extends Model
{
    protected $fillable = ['tenant_id', 'kitchen_ticket_id', 'from_status', 'to_status', 'user_id', 'meta'];
    protected $casts    = ['meta' => 'array'];
}
