<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockAdjustment extends Model
{
    protected $fillable = ['tenant_id', 'outlet_id', 'ingredient_id', 'type', 'qty', 'reason', 'user_id'];
}
