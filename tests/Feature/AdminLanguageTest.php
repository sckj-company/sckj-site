<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminLanguageTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_panel_offers_portuguese_english_and_chinese(): void
    {
        $user = User::factory()->create([
            'role' => 'admin',
            'ativo' => true,
        ]);

        $response = $this->actingAs($user)->get(route('admin.dashboard'));

        $response->assertOk();

        foreach (['pt', 'en', 'zh'] as $codigo) {
            $response->assertSee(route('idioma', $codigo), false);
        }

        $response->assertSee('Português');
        $response->assertSee('English');
        $response->assertSee('中文');
    }

    public function test_admin_panel_follows_the_selected_language(): void
    {
        $user = User::factory()->create([
            'role' => 'admin',
            'ativo' => true,
        ]);

        $this->actingAs($user);

        $this->get(route('idioma', 'pt'))->assertRedirect();
        $this->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee('lang="pt"', false)
            ->assertSee('Início')
            ->assertSee('Mensagens');

        $this->get(route('idioma', 'en'))->assertRedirect();
        $this->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee('lang="en"', false)
            ->assertSee('Home')
            ->assertSee('Messages');

        $this->get(route('idioma', 'zh'))->assertRedirect();
        $this->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee('lang="zh"', false)
            ->assertSee('首页')
            ->assertSee('消息');
    }

    public function test_login_heading_follows_the_selected_language(): void
    {
        $this->get(route('idioma', 'pt'))->assertRedirect();
        $this->get(route('login'))
            ->assertOk()
            ->assertSee('Iniciar Sessão');

        $this->get(route('idioma', 'en'))->assertRedirect();
        $this->get(route('login'))
            ->assertOk()
            ->assertSee('Sign in to your account');

        $this->get(route('idioma', 'zh'))->assertRedirect();
        $this->get(route('login'))
            ->assertOk()
            ->assertSee('登录账户');
    }

    public function test_category_menu_link_is_translated(): void
    {
        $user = User::factory()->create([
            'role' => 'admin',
            'ativo' => true,
        ]);

        $this->actingAs($user);

        $this->get(route('idioma', 'en'))->assertRedirect();
        $this->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee('Create Category');

        $this->get(route('idioma', 'zh'))->assertRedirect();
        $this->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee('创建类别');
    }

    public function test_unsupported_language_is_rejected(): void
    {
        $this->get(route('idioma', 'fr'))->assertNotFound();
    }
}
