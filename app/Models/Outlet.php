<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;
    protected $fillable = ['tenant_id', 'name', 'code', 'address', 'phone', 'tax_percent', 'service_charge_percent', 'is_active'];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
    public function tables()
    {
        return $this->hasMany(Table::class);
    }
}
