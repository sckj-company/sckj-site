<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Services\Translator;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    private function regras(): array
    {
        return [
            'titulo_pt' => ['required', 'string', 'max:150'],
            'titulo_en' => ['nullable', 'string', 'max:150'],
            'titulo_zh' => ['nullable', 'string', 'max:150'],
            'descricao_pt' => ['required', 'string', 'max:2000'],
            'descricao_en' => ['nullable', 'string', 'max:2000'],
            'descricao_zh' => ['nullable', 'string', 'max:2000'],
            'ordem' => ['nullable', 'integer', 'min:0', 'max:9999'],
        ];
    }

    private function mensagens(): array
    {
        return [
            'required' => __('admin.val_required'),
            'max' => __('admin.val_max_chars'),
            'integer' => __('admin.val_integer'),
        ];
    }

    private function completarTraducoes(array $dados, bool $retraduzir = false): array
    {
        $tradutor = app(Translator::class);

        if (! $tradutor->disponivel()) {
            return [$dados, true];
        }

        $falhou = false;

        foreach (['en', 'zh'] as $idioma) {
            $pedidos = [];

            foreach (['titulo', 'descricao'] as $campo) {
                $chave = "{$campo}_{$idioma}";

                if ($retraduzir || blank($dados[$chave] ?? null)) {
                    $pedidos[$chave] = $dados["{$campo}_pt"];
                }
            }

            if ($pedidos === []) {
                continue;
            }

            $traduzidos = $tradutor->traduzir($pedidos, $idioma);

            if ($traduzidos === null) {
                $falhou = true;

                continue;
            }

            foreach ($traduzidos as $chave => $texto) {
                $limite = str_starts_with($chave, 'titulo') ? 150 : 2000;
                $dados[$chave] = mb_substr($texto, 0, $limite);
            }
        }

        return [$dados, $falhou];
    }

    public function index()
    {
        $servicos = Service::with('criador')
            ->orderBy('status')
            ->orderBy('ordem')
            ->orderBy('id')
            ->get();

        return view('admin.servicos.index', compact('servicos'));
    }

    public function create()
    {
        return view('admin.servicos.create');
    }

    public function store(Request $request)
    {
        $dados = $request->validate($this->regras(), $this->mensagens());
        $dados['ordem'] = $dados['ordem'] ?? 0;

        [$dados, $falhou] = $this->completarTraducoes($dados);

        $admin = $request->user()->isAdmin();

        Service::create($dados + [
            'status' => $admin ? 'publicado' : 'pendente',
            'created_by' => $request->user()->id,
            'approved_by' => $admin ? $request->user()->id : null,
            'approved_at' => $admin ? now() : null,
        ]);

        $mensagem = $admin
            ? __('admin.flash_servico_publicado')
            : __('admin.flash_servico_aprovacao');

        if ($falhou) {
            $mensagem .= ' '.__('admin.flash_traducao_falhou');
        }

        return redirect()->route('admin.servicos.index')->with('sucesso', $mensagem);
    }

    public function edit(Service $servico)
    {
        return view('admin.servicos.edit', compact('servico'));
    }

    public function update(Request $request, Service $servico)
    {
        $dados = $request->validate($this->regras(), $this->mensagens());
        $dados['ordem'] = $dados['ordem'] ?? $servico->ordem;

        [$dados, $falhou] = $this->completarTraducoes($dados, $request->boolean('retraduzir'));

        $reenviado = $servico->status === 'rejeitado' && ! $request->user()->isAdmin();

        if ($reenviado) {
            $dados['status'] = 'pendente';
            $dados['motivo_rejeicao'] = null;
        }

        $servico->update($dados);

        $mensagem = $reenviado ? __('admin.flash_servico_reenviado') : __('admin.flash_servico_guardado');

        if ($falhou) {
            $mensagem .= ' '.__('admin.flash_traducao_falhou');
        }

        return redirect()->route('admin.servicos.index')->with('sucesso', $mensagem);
    }

    // ---- Só o Administrador ----

    public function aprovacoes()
    {
        $pendentes = Service::with('criador')
            ->where('status', 'pendente')
            ->latest()
            ->get();

        return view('admin.aprovacoes.index', compact('pendentes'));
    }

    public function aprovar(Request $request, Service $servico)
    {
        if ($servico->status === 'publicado') {
            return back()->with('erro', __('admin.flash_servico_ja_publicado'));
        }

        $servico->update([
            'status' => 'publicado',
            'approved_by' => $request->user()->id,
            'approved_at' => now(),
            'motivo_rejeicao' => null,
        ]);

        return back()->with('sucesso', __('admin.flash_servico_aprovado'));
    }

    public function rejeitar(Request $request, Service $servico)
    {
        if ($servico->status !== 'pendente') {
            return back()->with('erro', __('admin.flash_servico_rejeitar_pendente'));
        }

        $motivo = trim((string) $request->input('motivo_rejeicao'));

        if ($motivo === '') {
            return back()->with('erro', __('admin.flash_motivo_obrigatorio'));
        }

        $servico->update([
            'status' => 'rejeitado',
            'motivo_rejeicao' => mb_substr($motivo, 0, 500),
            'approved_by' => null,
            'approved_at' => null,
        ]);

        return back()->with('sucesso', __('admin.flash_servico_rejeitado'));
    }

    public function destroy(Service $servico)
    {
        $servico->delete();

        return redirect()->route('admin.servicos.index')->with('sucesso', __('admin.flash_servico_eliminado'));
    }
}
