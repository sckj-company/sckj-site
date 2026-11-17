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
            'required' => __('admin.val_required'),
            'string' => __('admin.val_string'),
            'email' => __('admin.val_email'),
            'unique' => __('admin.val_unique'),
            'confirmed' => __('admin.val_confirmed'),
            'max' => __('admin.val_max'),
            'in' => __('admin.val_in'),
            'min' => __('admin.val_min'),
            'password.regex' => __('admin.val_regex'),
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
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150', 'unique:users,email'],
            'role' => ['required', Rule::in(self::PAPEIS)],
            'password' => ['required', 'string', 'min:10', self::REGRA_PASSWORD, 'confirmed'],
        ], $this->mensagens());

        $utilizador = new User;
        $utilizador->name = $dados['name'];
        $utilizador->email = $dados['email'];
        $utilizador->password = Hash::make($dados['password']);
        $utilizador->role = $dados['role'];
        $utilizador->ativo = true;
        $utilizador->save();

        return redirect()->route('admin.utilizadores.index')
            ->with('sucesso', __('admin.flash_utilizador_criado'));
    }

    public function edit(User $utilizador)
    {
        return view('admin.utilizadores.edit', compact('utilizador'));
    }

    public function update(Request $request, User $utilizador)
    {
        $dados = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150', Rule::unique('users', 'email')->ignore($utilizador->id)],
            'role' => ['nullable', Rule::in(self::PAPEIS)],
            'password' => ['nullable', 'string', 'min:10', self::REGRA_PASSWORD, 'confirmed'],
        ], $this->mensagens());

        // Ninguém altera o próprio papel
        $papel = $utilizador->is($request->user())
            ? $utilizador->role
            : ($dados['role'] ?? $utilizador->role);

        if ($papel !== 'admin' && $this->ultimoAdmin($utilizador)) {
            return back()->withInput()
                ->with('erro', __('admin.flash_admin_obrigatorio'));
        }

        $utilizador->name = $dados['name'];
        $utilizador->email = $dados['email'];
        $utilizador->role = $papel;

        if (filled($dados['password'] ?? null)) {
            $utilizador->password = Hash::make($dados['password']);
        }

        $utilizador->save();

        return redirect()->route('admin.utilizadores.index')->with('sucesso', __('admin.flash_utilizador_guardado'));
    }

    public function alternar(Request $request, User $utilizador)
    {
        if ($utilizador->is($request->user())) {
            return back()->with('erro', __('admin.flash_nao_desativar_proprio'));
        }

        if ($this->ultimoAdmin($utilizador)) {
            return back()->with('erro', __('admin.flash_admin_obrigatorio'));
        }

        $utilizador->ativo = ! $utilizador->ativo;
        $utilizador->save();

        return back()->with('sucesso', $utilizador->ativo ? __('admin.flash_conta_ativada') : __('admin.flash_conta_desativada'));
    }
}
