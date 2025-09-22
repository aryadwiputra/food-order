<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItemAddon extends Model
{
    protected $fillable = ['tenant_id', 'order_item_id', 'menu_addon_id', 'addon_name_snapshot', 'price', 'qty', 'total'];
}
