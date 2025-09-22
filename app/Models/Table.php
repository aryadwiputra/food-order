<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $fillable = ['tenant_id', 'outlet_id', 'name', 'code', 'capacity', 'qr_token', 'is_active'];
    public function outlet()
    {return $this->belongsTo(Outlet::class);}
}
