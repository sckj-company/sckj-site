<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    //
    public function index(Request $request)
    {
        $estado = $request->query('estado');

        $mensagens = ContactMessage::query()
            ->when(
                in_array($estado, ContactMessage::ESTADOS, true),
                fn ($q) => $q->where('status', $estado)
            )
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.mensagens.index', compact('mensagens', 'estado'));
    }
    
    public function show(ContactMessage $mensagem)
    {
        if ($mensagem->status === 'nova') {
            $mensagem->update(['status' => 'lida']);
        }

        return view('admin.mensagens.show', compact('mensagem'));
    }
    
    public function respondida(Request $request, ContactMessage $mensagem)
    {
        $mensagem->update([
            'status'      => 'respondida',
            'answered_by' => $request->user()->id,
            'answered_at' => now(),
        ]);

        return back()->with('sucesso', 'Mensagem marcada como respondida.');
    }

    public function destroy(ContactMessage $mensagem)
    {
        $mensagem->delete();

        return redirect()->route('admin.mensagens.index')
            ->with('sucesso', 'Mensagem eliminada.');
    }

}
