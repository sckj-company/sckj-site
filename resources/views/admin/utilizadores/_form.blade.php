@php($utilizador = $utilizador ?? null)
@php($proprio = $utilizador && $utilizador->is(auth()->user()))

<div class="mb-3">
    <label class="form-label">Nome</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
           value="{{ old('name', $utilizador?->name) }}">
    @error('name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label class="form-label">Email</label>
    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
           value="{{ old('email', $utilizador?->email) }}">
    @error('email')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label class="form-label">Papel</label>
    <select name="role" class="form-select @error('role') is-invalid @enderror" @disabled($proprio)>
        <option value="funcionario" @selected(old('role', $utilizador?->role ?? 'funcionario') === 'funcionario')>Funcionário</option>
        <option value="admin" @selected(old('role', $utilizador?->role) === 'admin')>Administrador</option>
    </select>
    @if ($proprio)
        <div class="form-text">Não pode alterar o seu próprio papel.</div>
    @endif
    @error('role')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label class="form-label">Palavra-passe {{ $utilizador ? '(deixe vazio para manter)' : '' }}</label>
    <input type="password" name="password" autocomplete="new-password"
           class="form-control @error('password') is-invalid @enderror">
    <div class="form-text">Mínimo 10 caracteres, com letras e números.</div>
    @error('password')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label class="form-label">Repetir a palavra-passe</label>
    <input type="password" name="password_confirmation" autocomplete="new-password" class="form-control">
</div>