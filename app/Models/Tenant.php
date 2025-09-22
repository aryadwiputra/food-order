<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'code', 'timezone', 'currency', 'is_active', 'billing_plan', 'expired_at'];

    public function outlets()
    {return $this->hasMany(Outlet::class);}
    public function users()
    {return $this->belongsToMany(User::class, 'tenant_user_outlet')->withTimestamps();}
}
