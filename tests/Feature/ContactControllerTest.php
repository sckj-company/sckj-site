<?php

namespace Tests\Feature;

use App\Mail\NovaMensagemContacto;
use App\Models\ContactMessage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_valid_submission_persists_message_and_notifies_equipa(): void
    {
        Mail::fake();

        $response = $this->post(route('contacts.enviar'), [
            'nome' => 'João Silva',
            'prefixo' => 'AO',
            'telefone' => '912345678',
            'email' => 'joao@example.com',
            'assunto' => 'criacao-empresa',
            'mensagem' => 'Gostaria de obter informações sobre criação de empresa.',
        ]);

        $response->assertRedirect(route('contacts'))
            ->assertSessionHas('sucesso', __('contactos.sucesso'));

        $this->assertDatabaseHas('contact_messages', [
            'nome' => 'João Silva',
            'telefone' => '+244912345678',
            'email' => 'joao@example.com',
            'servico' => 'criacao-empresa',
            'mensagem' => 'Gostaria de obter informações sobre criação de empresa.',
            'status' => 'nova',
        ]);

        Mail::assertSent(NovaMensagemContacto::class, function (NovaMensagemContacto $mail): bool {
            return $mail->hasTo(config('mail.contacto.address'))
                && $mail->hasReplyTo('joao@example.com')
                && $mail->mensagem->email === 'joao@example.com';
        });
    }

    public function test_mailable_renders_message_details(): void
    {
        $mensagem = ContactMessage::factory()->make([
            'nome' => 'Maria Somália',
            'email' => 'maria@example.com',
            'telefone' => '+244923456789',
            'servico' => 'website-plataforma',
            'mensagem' => 'Preciso de um website para a minha empresa.',
        ]);

        $mail = new NovaMensagemContacto($mensagem);

        $mail->assertHasSubject(__('contactos.email_assunto', ['servico' => $mensagem->servicoNome()], 'pt'));
        $mail->assertSeeInHtml(__('contactos.email_titulo', [], 'pt'));
        $mail->assertSeeInHtml('Maria Somália');
        $mail->assertSeeInHtml('maria@example.com');
        $mail->assertSeeInHtml('+244923456789');
        $mail->assertSeeInHtml('Preciso de um website para a minha empresa.');
        $mail->assertSeeInText('Maria Somália');
        $mail->assertSeeInText('Preciso de um website para a minha empresa.');
    }

    public function test_invalid_submission_saves_nothing_and_sends_no_email(): void
    {
        Mail::fake();

        $response = $this->post(route('contacts.enviar'), [
            'nome' => 'João Silva',
            'prefixo' => 'AO',
            'telefone' => '912345678',
            'assunto' => 'criacao-empresa',
            'mensagem' => 'Mensagem de teste.',
        ]);

        $response->assertRedirect()
            ->assertSessionHasErrors(['email' => __('contactos.required')]);

        $this->assertDatabaseCount('contact_messages', 0);

        Mail::assertNothingOutgoing();
    }
}
