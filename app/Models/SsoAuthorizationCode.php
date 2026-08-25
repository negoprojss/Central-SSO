<?php

namespace App\Models;

use App\Models\SsoClient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SsoAuthorizationCode extends Model
{
     protected $fillable = [
        'code_hash',
        'client_id',
        'user_id',
        'redirect_uri',
        'scope',
        'expires_at',
        'used_at',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'used_at' => 'datetime',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(
            SsoClient::class,
            'client_id'
        );
    }
}
