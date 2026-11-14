<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    //
      protected $fillable = [
        'titulo_pt', 'titulo_en', 'titulo_zh',
        'descricao_pt', 'descricao_en', 'descricao_zh',
        'ordem', 'status', 'motivo_rejeicao',
        'created_by', 'approved_by', 'approved_at',
    ];

    protected function casts(): array
    {
        return ['approved_at' => 'datetime'];
    }

    public function scopePublicados(Builder $query): Builder
    {
        return $query->where('status', 'publicado')->orderBy('ordem')->orderBy('id');
    }

    public function criador(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function titulo(): string
    {
        return $this->traduzir('titulo');
    }

    public function descricao(): string
    {
        return $this->traduzir('descricao');
    }

    private function traduzir(string $campo): string
    {
        $valor = $this->{$campo . '_' . app()->getLocale()};

        return filled($valor) ? $valor : (string) $this->{$campo . '_pt'};
    }
}
