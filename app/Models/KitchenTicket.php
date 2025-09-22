<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KitchenTicket extends Model
{
    protected $fillable = ['tenant_id', 'outlet_id', 'order_id', 'station_id', 'status', 'ticket_no'];
}
