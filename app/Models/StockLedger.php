<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockLedger extends Model
{
    protected $fillable = ['tenant_id', 'outlet_id', 'ingredient_id', 'source_type', 'source_id', 'qty_change', 'qty_after', 'occurred_at'];
}
