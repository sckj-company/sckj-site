<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class SiteBlock extends Model
{
    //
    public const PAGINAS = [
        'home'      => 'Página inicial',
        'geral'     => 'Rodapé (menu e rodapé)',
        'contactos' => 'Contactos',
    ];

    protected $fillable = [
        'chave', 'pagina', 'rotulo', 'tipo',
        'valor_pt', 'valor_en', 'valor_zh', 'updated_by',
    ];

      private static ?Collection $memo = null;

    public static function texto(string $chave, string $padrao = ''): string
    {
        self::$memo ??= static::all()->keyBy('chave');

        $bloco = self::$memo->get($chave);

        if (! $bloco) {
            return $padrao;
        }

        $valor = $bloco->{'valor_' . app()->getLocale()};

        return filled($valor) ? $valor : (string) ($bloco->valor_pt ?: $padrao);
    }

}
