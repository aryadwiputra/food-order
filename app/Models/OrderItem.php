<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['tenant_id', 'order_id', 'menu_item_id', 'menu_variant_id', 'name_snapshot', 'variant_snapshot', 'qty', 'price', 'total', 'note', 'kitchen_station_id'];
    public function addons()
    {return $this->hasMany(OrderItemAddon::class);}
}
