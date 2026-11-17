<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoriaProjecto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CategoriaProjectoController extends Controller
{
    public function index(): View
    {
        $categorias = CategoriaProjecto::orderBy('nome')->get();

        return view('admin.categorias.index', compact('categorias'));
    }

    public function create(): View
    {
        return view('admin.categorias.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validar($request);

        CategoriaProjecto::create($validated);

        return redirect()->route('admin.categorias.index')
            ->with('sucesso', __('admin.cat_flash_criada'));
    }

    public function edit(CategoriaProjecto $categoriaProjecto): View
    {
        return view('admin.categorias.edit', compact('categoriaProjecto'));
    }

    public function update(Request $request, CategoriaProjecto $categoriaProjecto): RedirectResponse
    {
        $validated = $this->validar($request, $categoriaProjecto->id);

        $categoriaProjecto->update($validated);

        return redirect()->route('admin.categorias.index')
            ->with('sucesso', __('admin.cat_flash_guardada'));
    }

    public function destroy(CategoriaProjecto $categoriaProjecto): RedirectResponse
    {
        $categoriaProjecto->delete();

        return redirect()->route('admin.categorias.index')
            ->with('sucesso', __('admin.cat_flash_eliminada'));
    }

    /**
     * @return array<string, string>
     */
    private function validar(Request $request, ?int $categoriaId = null): array
    {
        $regraNome = Rule::unique('categoria_projectos', 'nome');

        if ($categoriaId !== null) {
            $regraNome->ignore($categoriaId);
        }

        return $request->validate([
            'nome' => ['required', 'string', 'max:100', $regraNome],
        ], [
            'required' => __('admin.val_required'),
            'max' => __('admin.val_max_chars'),
            'unique' => __('admin.cat_flash_duplicada'),
        ]);
    }
}
