<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminLanguageTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_panel_offers_all_languages(): void
    {
        $user = User::factory()->create([
            'role' => 'admin',
            'ativo' => true,
        ]);

        $response = $this->actingAs($user)->get(route('admin.dashboard'));

        $response->assertOk();

        foreach (['pt', 'en', 'zh', 'pt_zh'] as $codigo) {
            $response->assertSee(route('idioma', $codigo), false);
            $response->assertSee(bandeira_url($codigo), false);
        }

        $response->assertSee('Português');
        $response->assertSee('English');
        $response->assertSee('中文');
        $response->assertSee('Português / 中文');
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
            ->assertSee('Gestão do Site')
            ->assertSee('Início')
            ->assertSee('Mensagens');

        $this->get(route('idioma', 'en'))->assertRedirect();
        $this->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee('lang="en"', false)
            ->assertSee('Site Management')
            ->assertSee('Home')
            ->assertSee('Messages');

        $this->get(route('idioma', 'zh'))->assertRedirect();
        $this->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee('lang="zh"', false)
            ->assertSee('网站管理')
            ->assertSee('首页')
            ->assertSee('消息');

        $this->get(route('idioma', 'pt_zh'))->assertRedirect();
        $this->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee('lang="pt_zh"', false)
            ->assertSee('Gestão do Site / 网站管理')
            ->assertSee('Início / 首页')
            ->assertSee('Mensagens / 消息');
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
            ->assertSee('Sign in to your account')
            ->assertSee(bandeira_url('en'), false);

        $this->get(route('idioma', 'zh'))->assertRedirect();
        $this->get(route('login'))
            ->assertOk()
            ->assertSee('登录账户');

        $this->get(route('idioma', 'pt_zh'))->assertRedirect();
        $this->get(route('login'))
            ->assertOk()
            ->assertSee('Iniciar Sessão / 登录账户')
            ->assertSee(bandeira_url('pt_zh'), false);
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

    public function test_json_language_switch_stores_locale_and_returns_json(): void
    {
        $response = $this->getJson(route('idioma.json', 'en'));

        $response
            ->assertOk()
            ->assertExactJson(['locale' => 'en'])
            ->assertSessionHas('locale', 'en');

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('lang="en"', false);
    }

    public function test_json_language_switch_rejects_unsupported_locale(): void
    {
        $this->getJson(route('idioma.json', 'fr'))->assertNotFound();
    }
}
