<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebhookLog extends Model
{
    protected $fillable = ['tenant_id', 'provider', 'event', 'status_code', 'signature', 'payload', 'handled', 'error_message', 'received_at'];
    protected $casts    = ['payload' => 'array'];
}
