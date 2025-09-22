<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $fillable = ['tenant_id', 'category_id', 'sku', 'name', 'description', 'image_url', 'is_active', 'is_available'];
    public function category()
    {return $this->belongsTo(Category::class);}
    public function variants()
    {return $this->hasMany(MenuVariant::class);}
    public function addons()
    {return $this->belongsToMany(MenuAddon::class, 'menu_item_addon');}
}
