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
