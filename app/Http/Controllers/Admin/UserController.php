<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    private const PAPEIS = ['admin', 'funcionario'];

    private const REGRA_PASSWORD = 'regex:/^(?=.*[A-Za-z])(?=.*\d).+$/';

    private function mensagens(): array
    {
        return [
            'required'       => 'Este campo é obrigatório.',
            'string'         => 'Escreva um texto válido.',
            'email'          => 'Escreva um email válido.',
            'unique'         => 'Já existe um utilizador com este email.',
            'confirmed'      => 'As palavras-passe não coincidem.',
            'max'            => 'O texto é demasiado longo.',
            'in'             => 'Escolha uma opção válida.',
            'min'            => 'A palavra-passe tem de ter pelo menos :min caracteres.',
            'password.regex' => 'A palavra-passe tem de ter letras e números.',
        ];
    }

    private function ultimoAdmin(User $utilizador): bool
    {
        return $utilizador->isAdmin()
            && $utilizador->ativo
            && User::where('role', 'admin')->where('ativo', true)->count() <= 1;
    }

    public function index()
    {
        $utilizadores = User::orderBy('role')->orderBy('name')->get();

        return view('admin.utilizadores.index', compact('utilizadores'));
    }

    public function create()
    {
        return view('admin.utilizadores.create');
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'name'     => ['required', 'string', 'max:100'],
            'email'    => ['required', 'email', 'max:150', 'unique:users,email'],
            'role'     => ['required', Rule::in(self::PAPEIS)],
            'password' => ['required', 'string', 'min:10', self::REGRA_PASSWORD, 'confirmed'],
        ], $this->mensagens());

        $utilizador = new User();
        $utilizador->name = $dados['name'];
        $utilizador->email = $dados['email'];
        $utilizador->password = Hash::make($dados['password']);
        $utilizador->role = $dados['role'];
        $utilizador->ativo = true;
        $utilizador->save();

        return redirect()->route('admin.utilizadores.index')
            ->with('sucesso', 'Utilizador criado. Peça-lhe que mude a palavra-passe em "A minha conta".');
    }

    public function edit(User $utilizador)
    {
        return view('admin.utilizadores.edit', compact('utilizador'));
    }

    public function update(Request $request, User $utilizador)
    {
        $dados = $request->validate([
            'name'     => ['required', 'string', 'max:100'],
            'email'    => ['required', 'email', 'max:150', Rule::unique('users', 'email')->ignore($utilizador->id)],
            'role'     => ['nullable', Rule::in(self::PAPEIS)],
            'password' => ['nullable', 'string', 'min:10', self::REGRA_PASSWORD, 'confirmed'],
        ], $this->mensagens());

        // Ninguém altera o próprio papel
        $papel = $utilizador->is($request->user())
            ? $utilizador->role
            : ($dados['role'] ?? $utilizador->role);

        if ($papel !== 'admin' && $this->ultimoAdmin($utilizador)) {
            return back()->withInput()
                ->with('erro', 'Tem de existir pelo menos um Administrador ativo.');
        }

        $utilizador->name = $dados['name'];
        $utilizador->email = $dados['email'];
        $utilizador->role = $papel;

        if (filled($dados['password'] ?? null)) {
            $utilizador->password = Hash::make($dados['password']);
        }

        $utilizador->save();

        return redirect()->route('admin.utilizadores.index')->with('sucesso', 'Utilizador guardado.');
    }

    public function alternar(Request $request, User $utilizador)
    {
        if ($utilizador->is($request->user())) {
            return back()->with('erro', 'Não pode desativar a sua própria conta.');
        }

        if ($this->ultimoAdmin($utilizador)) {
            return back()->with('erro', 'Tem de existir pelo menos um Administrador ativo.');
        }

        $utilizador->ativo = ! $utilizador->ativo;
        $utilizador->save();

        return back()->with('sucesso', $utilizador->ativo ? 'Conta ativada.' : 'Conta desativada.');
    }
}