<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
     public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $credenciais = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ], [
            'required' => 'Este campo é obrigatório.',
            'email'    => 'Escreva um email válido.',
        ]);
        if (Auth::attempt($credenciais + ['ativo' => true], $request->boolean('lembrar'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard'));
        }

        return back()
            ->withErrors(['email' => 'Email ou palavra-passe incorretos.'])
            ->onlyInput('email');
    }

    public function destroy(Request $request)
    {
        $locale = $request->session()->get('locale');
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();


        if ($locale) {
            $request->session()->put('locale', $locale);
        }

        return redirect()->route('home');
    }

}
