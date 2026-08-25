<?php

namespace App\Models;

use App\Models\SsoClient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SsoAccessToken extends Model
{
    protected $fillable = [
        'token_hash',
        'client_id',
        'user_id',
        'expires_at',
        'revoked_at',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'revoked_at' => 'datetime',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(
            SsoClient::class,
            'client_id'
        );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function isValid(): bool
    {
        return $this->revoked_at === null
            && $this->expires_at->isFuture();
    }
}
