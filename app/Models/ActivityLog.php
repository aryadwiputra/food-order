<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $fillable = ['tenant_id', 'user_id', 'action', 'subject_type', 'subject_id', 'before', 'after', 'ip', 'ua'];
    protected $casts    = ['before' => 'array', 'after' => 'array'];
}
