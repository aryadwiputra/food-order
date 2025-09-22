<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KitchenStation extends Model
{
    protected $fillable = ['tenant_id', 'outlet_id', 'name', 'sort_order', 'is_active'];
}
