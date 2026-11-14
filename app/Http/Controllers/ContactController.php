<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class ContactController extends Controller
{
    public function enviar(Request $request)
    {
        $dados = $request->validate([
            'nome'     => ['required', 'string', 'max:100'],
            'prefixo'  => ['required', Rule::in(array_keys(config('paises')))],
            'telefone' => ['required', 'regex:/^[0-9\s\-]{6,15}$/'],
            'email'    => ['required', 'email', 'max:150'],
            'assunto'  => ['required', Rule::in(array_keys(ContactMessage::SERVICOS))],
            'mensagem' => ['required', 'string', 'max:2000'],
        ], [
            'required'       => __('contactos.required'),
            'string'         => __('contactos.string'),
            'max'            => __('contactos.max'),
            'email'          => __('contactos.email'),
            'prefixo.in'     => __('contactos.prefixo'),
            'telefone.regex' => __('contactos.telefone_regex'),
            'assunto.in'     => __('contactos.assunto'),
        ]);

        // Só dígitos, sem zeros à esquerda
        $numero = ltrim(preg_replace('/\D+/', '', $dados['telefone']), '0');

        if (strlen($numero) < 6 || strlen($numero) > 12) {
            throw ValidationException::withMessages([
                'telefone' => __('contactos.telefone'),
            ]);
        }

        $telefone = '+' . config("paises.{$dados['prefixo']}.prefixo") . $numero;

        ContactMessage::create([
            'nome'     => $dados['nome'],
            'telefone' => $telefone,
            'email'    => $dados['email'],
            'servico'  => $dados['assunto'],
            'mensagem' => $dados['mensagem'],
        ]);

        return redirect()->route('contacts')
            ->with('sucesso', __('contactos.sucesso'));
    }
}