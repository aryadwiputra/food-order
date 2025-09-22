<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuVariant extends Model
{
    protected $fillable = ['tenant_id', 'menu_item_id', 'name', 'code', 'base_price', 'is_active'];
    public function menuItem()
    {return $this->belongsTo(MenuItem::class);}
    public function prices()
    {return $this->hasMany(MenuVariantPrice::class);}
}
