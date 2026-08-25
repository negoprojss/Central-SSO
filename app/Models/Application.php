<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
