<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Throwable;

class Translator
{
    private const DESTINOS = [
        'en' => 'EN-GB',
        'zh' => 'ZH',
    ];

    public function disponivel(): bool
    {
        return filled(config('services.deepl.key'));
    }

    /**
     * Traduz textos de português para o idioma indicado.
     *
     * @param  array<string, string>  $textos  chave => texto em português
     * @return array<string, string>|null      chave => tradução, ou null se falhar
     */
    public function traduzir(array $textos, string $idioma): ?array
    {
        $destino = self::DESTINOS[$idioma] ?? null;

        if (! $destino || ! $this->disponivel() || $textos === []) {
            return null;
        }

        $chaves = array_keys($textos);

        try {
            $resposta = Http::withHeaders([
                    'Authorization' => 'DeepL-Auth-Key ' . config('services.deepl.key'),
                ])
                ->timeout(10)
                ->post(config('services.deepl.url'), [
                    'text'        => array_values($textos),
                    'source_lang' => 'PT',
                    'target_lang' => $destino,
                ]);

            if (! $resposta->successful()) {
                Log::warning('Tradução automática falhou', ['estado' => $resposta->status()]);
                return null;
            }

            $traducoes = $resposta->json('translations', []);

            if (count($traducoes) !== count($chaves)) {
                return null;
            }

            $resultado = [];
            foreach ($chaves as $i => $chave) {
                $resultado[$chave] = $traducoes[$i]['text'] ?? '';
            }

            return $resultado;
        } catch (Throwable $e) {
            Log::warning('Tradução automática falhou', ['erro' => $e->getMessage()]);
            return null;
        }
    }
}