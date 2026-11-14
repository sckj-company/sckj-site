<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function edit()
    {
        return view('admin.conta.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'password_atual' => ['required', 'current_password'],
            'password'       => ['required', 'string', 'min:10', 'regex:/^(?=.*[A-Za-z])(?=.*\d).+$/', 'confirmed', 'different:password_atual'],
        ], [
            'required'         => 'Este campo é obrigatório.',
            'current_password' => 'A palavra-passe atual está incorreta.',
            'min'              => 'A palavra-passe tem de ter pelo menos :min caracteres.',
            'password.regex'   => 'A palavra-passe tem de ter letras e números.',
            'confirmed'        => 'As palavras-passe não coincidem.',
            'different'        => 'A nova palavra-passe tem de ser diferente da atual.',
        ]);

        $request->user()->forceFill([
            'password' => Hash::make($request->input('password')),
        ])->save();

        return back()->with('sucesso', 'Palavra-passe alterada.');
    }
}