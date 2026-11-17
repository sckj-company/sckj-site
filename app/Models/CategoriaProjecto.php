<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoriaProjecto extends Model
{
    protected $fillable = [
        'nome',
    ];

    public function portfolios(): HasMany
    {
        return $this->hasMany(Portfolio::class, 'categoria_projecto_id');
    }
}
