<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteImage;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class SiteImageController extends Controller
{
    //
     public function index()
    {
        $imagens = SiteImage::orderBy('pagina')->orderBy('id')->get();

        return view('admin.imagens.index', compact('imagens'));
    }

    public function edit(SiteImage $imagem)
    {
        return view('admin.imagens.edit', compact('imagem'));
    }

    public function update(Request $request, SiteImage $imagem)
    {
        $dados = $request->validate([
            'ficheiro' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:3072'],
            'alt_pt'   => ['nullable', 'string', 'max:255'],
            'alt_en'   => ['nullable', 'string', 'max:255'],
            'alt_zh'   => ['nullable', 'string', 'max:255'],
        ], [
            'image'    => 'O ficheiro tem de ser uma imagem.',
            'mimes'    => 'Use uma imagem JPG, PNG ou WebP.',
            'ficheiro.max' => 'A imagem é demasiado grande (máximo 3 MB).',
            'max'      => 'O texto é demasiado longo.',
        ]);

        $aviso = '';

        if ($request->hasFile('ficheiro')) {
            $ficheiro = $request->file('ficheiro');
            [$largura, $altura] = getimagesize($ficheiro->getRealPath()) ?: [0, 0];

            $novo = $ficheiro->store('imagens', 'uploads');

            if ($imagem->caminho) {
                Storage::disk('uploads')->delete($imagem->caminho);
            }

            $imagem->caminho = $novo;

            if ($imagem->largura_rec && $imagem->altura_rec && $largura && $altura) {
                $esperada = $imagem->largura_rec / $imagem->altura_rec;
                $real = $largura / $altura;

                if (abs($real - $esperada) / $esperada > 0.15) {
                    $aviso = " Atenção: a proporção da imagem ({$largura}×{$altura}) difere da recomendada "
                        . "({$imagem->largura_rec}×{$imagem->altura_rec}), e pode aparecer cortada.";
                }
            }
        }

        $imagem->fill(Arr::only($dados, ['alt_pt', 'alt_en', 'alt_zh']));
        $imagem->updated_by = $request->user()->id;
        $imagem->save();

        return redirect()->route('admin.imagens.index')
            ->with('sucesso', 'Imagem guardada.' . $aviso);
    }

    public function repor(SiteImage $imagem)
    {
        if ($imagem->caminho) {
            Storage::disk('uploads')->delete($imagem->caminho);
        }

        $imagem->update(['caminho' => null]);

        return back()->with('sucesso', 'Imagem original reposta.');
    }
}
