<?php

namespace App\Models;

use App\Models\SsoClient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Application extends Model
{
     protected $fillable = [
        'name',
        'slug',
        'description',
        'url',
        'icon',
        'color',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

     public function ssoClient(): HasOne
    {
        return $this->hasOne(SsoClient::class);
    }
}
