<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = ['tenant_id', 'sku', 'name', 'unit', 'min_stock', 'is_active'];
}
