<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoriaProjecto;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    public function index()
    {
        $query = Portfolio::query();

        // Funcionários visualizam apenas os seus projetos.
        if (! Auth::user()->isAdmin()) {
            $query->where(function ($q) {
                $q->where('status', true)
                    ->orWhere('created_by', Auth::id());
            });
        }

        $portfolios = $query->latest()->paginate(10);

        return view('admin.portfolio.index', compact('portfolios'));
    }

    public function create()
    {
        $categorias = $this->categorias();

        return view('admin.portfolio.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'categoria_projecto_id' => ['required', 'integer', 'exists:categoria_projectos,id'],
            'description' => 'required|string',
            'technologies' => 'nullable|string',
            'demo_url' => 'nullable|url|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'featured' => 'nullable|boolean',
        ], [
            'required' => __('admin.val_required'),
            'exists' => __('admin.val_in'),
        ]);

        $validated['category'] = CategoriaProjecto::findOrFail($validated['categoria_projecto_id'])->nome;

        $user = Auth::user();

        $validated['slug'] = Str::slug($validated['title']);
        $validated['technologies'] = ! empty($validated['technologies'])
            ? array_map('trim', explode(',', $validated['technologies']))
            : [];

        $validated['featured'] = $request->boolean('featured');
        $validated['created_by'] = $user->id;

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('portfolio', 'public');
        }

        // Administrador publica diretamente.
        if ($user->isAdmin()) {
            $validated['status'] = true;
            $validated['approval_status'] = 'aprovado';
            $validated['approved_by'] = $user->id;
            $validated['approved_at'] = now();
            $validated['motivo_rejeicao'] = null;
        } else {
            // Funcionário precisa de aprovação.
            $validated['status'] = false;
            $validated['approval_status'] = 'pendente';
            $validated['approved_by'] = null;
            $validated['approved_at'] = null;
            $validated['motivo_rejeicao'] = null;
        }

        Portfolio::create($validated);

        return redirect()
            ->route('admin.portfolio.index')
            ->with('success', $user->isAdmin()
                ? __('admin.flash_portfolio_publicado')
                : __('admin.flash_portfolio_enviado'));
    }

    public function edit(Portfolio $portfolio)
    {
        $this->authorizePortfolio($portfolio);

        $categorias = $this->categorias();

        return view('admin.portfolio.edit', compact('portfolio', 'categorias'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $this->authorizePortfolio($portfolio);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'categoria_projecto_id' => ['required', 'integer', 'exists:categoria_projectos,id'],
            'description' => 'required|string',
            'technologies' => 'nullable|string',
            'demo_url' => 'nullable|url|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'featured' => 'nullable|boolean',
        ], [
            'required' => __('admin.val_required'),
            'exists' => __('admin.val_in'),
        ]);

        $validated['category'] = CategoriaProjecto::findOrFail($validated['categoria_projecto_id'])->nome;

        $user = Auth::user();

        $validated['slug'] = Str::slug($validated['title']);
        $validated['technologies'] = ! empty($validated['technologies'])
            ? array_map('trim', explode(',', $validated['technologies']))
            : [];

        $validated['featured'] = $request->boolean('featured');

        if ($request->hasFile('image')) {
            if ($portfolio->image) {
                Storage::disk('public')->delete($portfolio->image);
            }

            $validated['image'] = $request->file('image')
                ->store('portfolio', 'public');
        }

        if ($user->isAdmin()) {
            // Administrador pode publicar diretamente.
            $validated['status'] = true;
            $validated['approval_status'] = 'aprovado';
            $validated['approved_by'] = $user->id;
            $validated['approved_at'] = now();
            $validated['motivo_rejeicao'] = null;
        } elseif ($portfolio->approval_status === 'rejeitado') {
            // Projeto rejeitado volta para aprovação após correção.
            $validated['status'] = false;
            $validated['approval_status'] = 'pendente';
            $validated['approved_by'] = null;
            $validated['approved_at'] = null;
            $validated['motivo_rejeicao'] = null;
        }

        // Projetos publicados editados pelo funcionário
        // mantêm a publicação e a aprovação existentes.
        $portfolio->update($validated);

        return redirect()
            ->route('admin.portfolio.index')
            ->with('success', $portfolio->approval_status === 'pendente'
                ? __('admin.flash_portfolio_atualizado_aprovacao')
                : __('admin.flash_portfolio_atualizado'));
    }

    // Listar projetos pendentes
    public function aprovacoes()
    {
        $portfolios = Portfolio::where('approval_status', 'pendente')
            ->latest()
            ->paginate(10);

        return view('admin.portfolio.aprovacoes', compact('portfolios'));
    }

    // Aprovar portfólio
    public function aprovar(Portfolio $portfolio)
    {
        $portfolio->update([
            'approval_status' => 'aprovado',
            'status' => true,
            'approved_by' => Auth::id(),
            'approved_at' => now(),
            'motivo_rejeicao' => null,
        ]);

        return redirect()
            ->back()
            ->with('success', __('admin.flash_portfolio_aprovado'));
    }

    // Rejeitar portfólio
    public function rejeitar(Request $request, Portfolio $portfolio)
    {
        $validated = $request->validate([
            'motivo_rejeicao' => 'required|string|max:500',
        ]);

        $portfolio->update([
            'approval_status' => 'rejeitado',
            'status' => false,
            'approved_by' => null,
            'approved_at' => null,
            'motivo_rejeicao' => $validated['motivo_rejeicao'],
        ]);

        return redirect()
            ->back()
            ->with('success', __('admin.flash_portfolio_rejeitado'));
    }

    // Eliminar portfólio
    public function destroy(Portfolio $portfolio)
    {
        if ($portfolio->image) {
            Storage::disk('public')->delete($portfolio->image);
        }

        $portfolio->delete();

        return redirect()
            ->route('admin.portfolio.index')
            ->with('success', __('admin.flash_projeto_eliminado'));
    }

    /**
     * @return array<int, string>
     */
    private function categorias(): array
    {
        return CategoriaProjecto::orderBy('nome')->pluck('nome', 'id')->all();
    }

    // Verificar se o utilizador pode editar o projeto.
    private function authorizePortfolio(Portfolio $portfolio): void
    {
        abort_unless(
            Auth::user()->isAdmin()
            || (int) $portfolio->created_by === (int) Auth::id(),
            403
        );
    }
}
