<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class SiteImage extends Model
{
    //
     protected $fillable = [
        'chave', 'pagina', 'rotulo', 'padrao', 'caminho',
        'largura_rec', 'altura_rec',
        'alt_pt', 'alt_en', 'alt_zh', 'updated_by',
    ];

    private static ?Collection $memo = null;

    public static function porChave(string $chave): ?self
    {
        self::$memo ??= static::all()->keyBy('chave');

        return self::$memo->get($chave);
    }

    public static function url(string $chave, string $padrao): string
    {
        $imagem = self::porChave($chave);
        $caminho = $imagem?->caminho;

        // Só usa a imagem enviada se o ficheiro existir mesmo
        if ($caminho && file_exists(public_path('uploads/' . $caminho))) {
            return asset('uploads/' . $caminho);
        }

        return asset($imagem?->padrao ?: $padrao);
    }

    public static function alt(string $chave): string
    {
        $imagem = self::porChave($chave);

        if (! $imagem) {
            return '';
        }

        $valor = $imagem->{'alt_' . app()->getLocale()};

        return (string) (filled($valor) ? $valor : $imagem->alt_pt);
    }
}
