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
            'titulo_pt'    => ['required', 'string', 'max:150'],
            'titulo_en'    => ['nullable', 'string', 'max:150'],
            'titulo_zh'    => ['nullable', 'string', 'max:150'],
            'descricao_pt' => ['required', 'string', 'max:2000'],
            'descricao_en' => ['nullable', 'string', 'max:2000'],
            'descricao_zh' => ['nullable', 'string', 'max:2000'],
            'ordem'        => ['nullable', 'integer', 'min:0', 'max:9999'],
        ];
    }

    private function mensagens(): array
    {
        return [
            'required' => 'Este campo é obrigatório.',
            'max'      => 'O texto é demasiado longo (máximo :max caracteres).',
            'integer'  => 'Escreva um número inteiro.',
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
            'status'      => $admin ? 'publicado' : 'pendente',
            'created_by'  => $request->user()->id,
            'approved_by' => $admin ? $request->user()->id : null,
            'approved_at' => $admin ? now() : null,
        ]);

        $mensagem = $admin
            ? 'Serviço publicado.'
            : 'Serviço enviado para aprovação do Administrador.';

        if ($falhou) {
            $mensagem .= ' A tradução automática falhou: preencha o inglês e o chinês manualmente.';
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

        $mensagem = $reenviado ? 'Serviço reenviado para aprovação.' : 'Serviço guardado.';

        if ($falhou) {
            $mensagem .= ' A tradução automática falhou: preencha o inglês e o chinês manualmente.';
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
            return back()->with('erro', 'Este serviço já está publicado.');
        }

        $servico->update([
            'status'          => 'publicado',
            'approved_by'     => $request->user()->id,
            'approved_at'     => now(),
            'motivo_rejeicao' => null,
        ]);

        return back()->with('sucesso', 'Serviço aprovado e publicado.');
    }

    public function rejeitar(Request $request, Service $servico)
    {
        if ($servico->status !== 'pendente') {
            return back()->with('erro', 'Só é possível rejeitar serviços pendentes.');
        }

        $motivo = trim((string) $request->input('motivo_rejeicao'));

        if ($motivo === '') {
            return back()->with('erro', 'Escreva o motivo da rejeição.');
        }

        $servico->update([
            'status'          => 'rejeitado',
            'motivo_rejeicao' => mb_substr($motivo, 0, 500),
            'approved_by'     => null,
            'approved_at'     => null,
        ]);

        return back()->with('sucesso', 'Serviço rejeitado. O Funcionário vê o motivo.');
    }

    public function destroy(Service $servico)
    {
        $servico->delete();

        return redirect()->route('admin.servicos.index')->with('sucesso', 'Serviço eliminado.');
    }
}
