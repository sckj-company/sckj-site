<?php

use App\Models\SiteBlock;
use App\Models\SiteImage;

if (! function_exists('conteudo')) {
    function conteudo(string $chave, string $padrao = ''): string
    {
        return SiteBlock::texto($chave, $padrao);
    }
}
if (! function_exists('imagem')) {
    function imagem(string $chave, string $padrao): string
    {
        return SiteImage::url($chave, $padrao);
    }
}

if (! function_exists('imagem_alt')) {
    function imagem_alt(string $chave): string
    {
        return SiteImage::alt($chave);
    }
}

if (! function_exists('bandeira_url')) {
    function bandeira_url(string $codigo): string
    {
        $codigo = array_key_exists($codigo, config('idiomas')) ? $codigo : 'pt';

        return asset('assets/img/flags/'.$codigo.'.svg');
    }
}

if (! function_exists('imagem_alt_i18n')) {
    /**
     * @return array{pt: string, en: string, zh: string, pt_zh: string}
     */
    function imagem_alt_i18n(string $chave): array
    {
        return i18n_values(fn () => imagem_alt($chave), ' / ', false);
    }
}

if (! function_exists('i18n_values')) {
    /**
     * Devolve o texto de um bloco em todos os idiomas para troca sem recarregar a página.
     *
     * @param  callable(): string  $callback
     * @return array{pt: string, en: string, zh: string, pt_zh: string}
     */
    function i18n_values(callable $callback, string $separator = '<br>', bool $escape = true): array
    {
        $locale = app()->getLocale();
        $values = [];

        try {
            foreach (['pt', 'en', 'zh'] as $lang) {
                app()->setLocale($lang);
                $value = (string) $callback();
                $values[$lang] = $escape ? e($value) : $value;
            }
        } finally {
            app()->setLocale($locale);
        }

        $values['pt_zh'] = $values['pt'] === $values['zh']
            ? $values['pt']
            : $values['pt'].$separator.$values['zh'];

        return $values;
    }
}
