<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Service;
use App\Models\SiteBlock;
use App\Models\SiteImage;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * @return array<int, array{titulo: string, descricao: string, link: string, total: int, legenda: string, icone: string}>
     */
    private function cartoes(bool $admin): array
    {
        $cartoes = [
            [
                'titulo' => __('admin.dash_cartao_mensagens'),
                'descricao' => __('admin.dash_cartao_mensagens_desc'),
                'link' => route('admin.mensagens.index'),
                'total' => ContactMessage::where('status', 'nova')->count(),
                'legenda' => __('admin.dash_novas'),
                'icone' => 'fa-solid fa-envelope',
            ],
            [
                'titulo' => __('admin.dash_cartao_textos'),
                'descricao' => __('admin.dash_cartao_textos_desc'),
                'link' => route('admin.textos.index'),
                'total' => SiteBlock::count(),
                'legenda' => '',
                'icone' => 'fa-solid fa-file-lines',
            ],
            [
                'titulo' => __('admin.dash_cartao_servicos'),
                'descricao' => __('admin.dash_cartao_servicos_desc'),
                'link' => route('admin.servicos.index'),
                'total' => Service::count(),
                'legenda' => '',
                'icone' => 'fa-solid fa-briefcase',
            ],
            [
                'titulo' => __('admin.dash_cartao_imagens'),
                'descricao' => __('admin.dash_cartao_imagens_desc'),
                'link' => route('admin.imagens.index'),
                'total' => SiteImage::count(),
                'legenda' => '',
                'icone' => 'fa-solid fa-images',
            ],
        ];

        if ($admin) {
            $cartoes[] = [
                'titulo' => __('admin.dash_cartao_aprovacoes'),
                'descricao' => __('admin.dash_cartao_aprovacoes_desc'),
                'link' => route('admin.aprovacoes.index'),
                'total' => Service::where('status', 'pendente')->count(),
                'legenda' => __('admin.dash_pendentes'),
                'icone' => 'fa-solid fa-check-to-slot',
            ];
            $cartoes[] = [
                'titulo' => __('admin.dash_cartao_utilizadores'),
                'descricao' => __('admin.dash_cartao_utilizadores_desc'),
                'link' => route('admin.utilizadores.index'),
                'total' => User::count(),
                'legenda' => '',
                'icone' => 'fa-solid fa-users',
            ];
        }

        return $cartoes;
    }

    public function index(): View
    {
        $admin = auth()->user()->isAdmin();

        return view('admin.dashboard', [
            'admin' => $admin,
            'cartoes' => $this->cartoes($admin),
            'serieMensagens' => $this->mensagensPorMes(),
            'totalInteracoes' => ContactMessage::count(),
        ]);
    }

    /**
     * @return array<int, array{periodo: string, label: string, total: int}>
     */
    private function mensagensPorMes(): array
    {
        $agrupamento = DB::connection()->getDriverName() === 'sqlite'
            ? "strftime('%Y-%m', created_at)"
            : "DATE_FORMAT(created_at, '%Y-%m')";

        $totais = ContactMessage::query()
            ->toBase()
            ->selectRaw($agrupamento.' as periodo, COUNT(*) as total')
            ->where('created_at', '>=', now()->subMonths(11)->startOfMonth())
            ->groupByRaw($agrupamento)
            ->orderByRaw($agrupamento)
            ->pluck('total', 'periodo');

        return collect(range(11, 0))
            ->map(function (int $mesesAtras) use ($totais): array {
                $mes = now()->subMonths($mesesAtras);
                $periodo = $mes->format('Y-m');

                return [
                    'periodo' => $periodo,
                    'label' => $mes->format('m'),
                    'total' => (int) ($totais[$periodo] ?? 0),
                ];
            })
            ->all();
    }
}
