<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuAddon extends Model
{
    protected $fillable = ['tenant_id', 'name', 'description', 'price', 'is_active'];
}
