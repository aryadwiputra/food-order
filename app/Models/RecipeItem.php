<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecipeItem extends Model
{
    protected $fillable = ['tenant_id', 'recipe_id', 'ingredient_id', 'qty'];
}
