<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Portfolio extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'categoria_projecto_id',
        'description',
        'image',
        'technologies',
        'demo_url',
        'status',
        'featured',
        'created_by',
        'approved_by',
        'approved_at',
        'motivo_rejeicao',
        'approval_status',
    ];

    protected function casts(): array
    {
        return [
            'technologies' => 'array',
            'status' => 'boolean',
            'featured' => 'boolean',
            'approved_at' => 'datetime',
        ];
    }

    public function criador()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function aprovador()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function categoriaProjecto(): BelongsTo
    {
        return $this->belongsTo(CategoriaProjecto::class, 'categoria_projecto_id');
    }
}
