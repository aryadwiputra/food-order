<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuVariantPrice extends Model
{
    protected $fillable = ['tenant_id', 'outlet_id', 'menu_variant_id', 'price', 'is_active'];
}
