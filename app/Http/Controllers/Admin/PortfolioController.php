<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::latest()->paginate(10);

        return view('admin.portfolio.index', compact('portfolios'));
    }

    public function create()
    {
        return view('admin.portfolio.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'technologies' => 'nullable|string',
            'demo_url' => 'nullable|url|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|boolean',
            'featured' => 'nullable|boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        $validated['technologies'] = !empty($validated['technologies'])
            ? array_map('trim', explode(',', $validated['technologies']))
            : [];

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('portfolio', 'public');
        }

        $validated['featured'] = $request->boolean('featured');

        Portfolio::create($validated);

        return redirect()
            ->route('admin.portfolio.index')
            ->with('success', 'Projeto cadastrado com sucesso!');
    }

    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolio.edit', compact('portfolio'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'technologies' => 'nullable|string',
            'demo_url' => 'nullable|url|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|boolean',
            'featured' => 'nullable|boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        $validated['technologies'] = !empty($validated['technologies'])
            ? array_map('trim', explode(',', $validated['technologies']))
            : [];

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('portfolio', 'public');
        }

        $validated['featured'] = $request->boolean('featured');

        $portfolio->update($validated);

        return redirect()
            ->route('admin.portfolio.index')
            ->with('success', 'Projeto atualizado com sucesso!');
    }

    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();

        return redirect()
            ->route('admin.portfolio.index')
            ->with('success', 'Projeto eliminado com sucesso!');
    }
}
