<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IngredientStock extends Model
{
    protected $fillable = ['tenant_id', 'outlet_id', 'ingredient_id', 'qty_on_hand'];
}
