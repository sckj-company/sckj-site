<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'description',
        'image',
        'technologies',
        'demo_url',
        'status',
        'featured',
    ];

    protected function casts(): array
    {
        return [
            'technologies' => 'array',
            'status' => 'boolean',
            'featured' => 'boolean',
        ];
    }
}