<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ErrorLog extends Model
{
    protected $fillable = ['tenant_id', 'message', 'context', 'trace', 'occurred_at'];
    protected $casts    = ['context' => 'array'];
}
