@php($utilizador = $utilizador ?? null)
@php($proprio = $utilizador && $utilizador->is(auth()->user()))

<div class="mb-3">
    <label class="form-label">{{ __('admin.nome') }}</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
           value="{{ old('name', $utilizador?->name) }}">
    @error('name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label class="form-label">{{ __('admin.email') }}</label>
    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
           value="{{ old('email', $utilizador?->email) }}">
    @error('email')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label class="form-label">{{ __('admin.papel') }}</label>
    <select name="role" class="form-select @error('role') is-invalid @enderror" @disabled($proprio)>
        <option value="funcionario" @selected(old('role', $utilizador?->role ?? 'funcionario') === 'funcionario')>{{ __('admin.funcionario') }}</option>
        <option value="admin" @selected(old('role', $utilizador?->role) === 'admin')>{{ __('admin.administrador') }}</option>
    </select>
    @if ($proprio)
        <div class="form-text">{{ __('admin.usr_nao_papel') }}</div>
    @endif
    @error('role')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label class="form-label">{{ __('admin.conta_senha_nova') }} {{ $utilizador ? __('admin.usr_senha_vazia') : '' }}</label>
    <input type="password" name="password" autocomplete="new-password"
           class="form-control @error('password') is-invalid @enderror">
    <div class="form-text">{{ __('admin.conta_senha_regra') }}</div>
    @error('password')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label class="form-label">{{ __('admin.usr_repetir_senha') }}</label>
    <input type="password" name="password_confirmation" autocomplete="new-password" class="form-control">
</div>
