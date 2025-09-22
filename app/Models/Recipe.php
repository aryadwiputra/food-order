<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = ['tenant_id', 'menu_item_id', 'menu_variant_id', 'is_active'];
    public function items()
    {return $this->hasMany(RecipeItem::class);}
}
