<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteBlock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteBlockController extends Controller
{
    //
    public function index()
    {
        $paginas = SiteBlock::query()
            ->select('pagina', DB::raw('count(*) as total'))
            ->groupBy('pagina')
            ->orderBy('pagina')
            ->get();

        return view('admin.textos.index', compact('paginas'));
    }

    public function edit(string $pagina)
    {
        $blocos = SiteBlock::where('pagina', $pagina)->orderBy('id')->get();
        abort_if($blocos->isEmpty(), 404);

        return view('admin.textos.edit', compact('pagina', 'blocos'));
    }

    public function update(Request $request, string $pagina)
    {
        $blocos = SiteBlock::where('pagina', $pagina)->get();
        abort_if($blocos->isEmpty(), 404);

        $request->validate([
            'blocos' => ['required', 'array'],
            'blocos.*.pt' => ['required', 'string', 'max:5000'],
            'blocos.*.en' => ['nullable', 'string', 'max:5000'],
            'blocos.*.zh' => ['nullable', 'string', 'max:5000'],
        ], [
            'blocos.*.pt.required' => __('admin.val_pt_obrigatorio'),
        ]);

        foreach ($blocos as $bloco) {
            $v = $request->input("blocos.{$bloco->id}");

            if (! is_array($v)) {
                continue;
            }

            $bloco->update([
                'valor_pt' => $v['pt'] ?? null,
                'valor_en' => $v['en'] ?? null,
                'valor_zh' => $v['zh'] ?? null,
                'updated_by' => $request->user()->id,
            ]);
        }

        return back()->with('sucesso', __('admin.flash_textos_guardados'));
    }
}
