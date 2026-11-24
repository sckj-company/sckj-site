<x-mail::message>
# {{ __('contactos.email_titulo') }}

{{ __('contactos.email_intro') }}

**{{ __('contactos.email_nome') }}:** {{ $mensagem->nome }}

**{{ __('contactos.email_email') }}:** {{ $mensagem->email }}

**{{ __('contactos.email_telefone') }}:** {{ $mensagem->telefone }}

**{{ __('contactos.email_servico') }}:** {{ $mensagem->servicoNome() }}

**{{ __('contactos.email_mensagem') }}:**

{{ $mensagem->mensagem }}

{{ __('contactos.email_nota') }}

{{ config('app.name') }}
</x-mail::message>
