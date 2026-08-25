<?php

namespace App\Models;

use App\Models\Application;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SsoClient extends Model
{
     protected $fillable = [
        'name',
        'client_id',
        'client_secret',
        'redirect_uri',
        'application_id',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function application(): BelongsTo
    {
        return $this->belongsTo(Application::class);
    }
}
