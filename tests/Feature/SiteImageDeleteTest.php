<?php

namespace Tests\Feature;

use App\Models\SiteImage;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class SiteImageDeleteTest extends TestCase
{
    use RefreshDatabase;

    public function test_uploaded_image_can_be_deleted_and_reverts_to_the_original(): void
    {
        Storage::fake('uploads');
        Storage::disk('uploads')->put('teste.jpg', 'conteudo de teste');

        $admin = User::factory()->create([
            'role' => 'admin',
            'ativo' => true,
        ]);
        $imagem = SiteImage::create([
            'chave' => 'teste',
            'pagina' => 'inicio',
            'rotulo' => 'Imagem de teste',
            'padrao' => 'assets/img/teste.jpg',
            'caminho' => 'teste.jpg',
        ]);

        $this->actingAs($admin);

        $this->get(route('idioma', 'pt'))->assertRedirect();
        $this->get(route('admin.imagens.edit', $imagem))
            ->assertOk()
            ->assertSee('Eliminar imagem');

        $this->delete(route('admin.imagens.repor', $imagem))
            ->assertRedirect();

        Storage::disk('uploads')->assertMissing('teste.jpg');
        $this->assertDatabaseHas('site_images', [
            'id' => $imagem->id,
            'caminho' => null,
        ]);
    }
}
