<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class I18nValuesTest extends TestCase
{
    use RefreshDatabase;

    public function test_helper_returns_every_locale_and_restores_the_original_locale(): void
    {
        app()->setLocale('en');

        $values = i18n_values(fn () => app()->getLocale());

        $this->assertSame([
            'pt' => 'pt',
            'en' => 'en',
            'zh' => 'zh',
            'pt_zh' => 'pt<br>zh',
        ], $values);
        $this->assertSame('en', app()->getLocale());
    }

    public function test_helper_escapes_html_values_before_client_side_rendering(): void
    {
        $values = i18n_values(fn () => 'O\'Brien & "SCKJ"');

        $this->assertSame('O&#039;Brien &amp; &quot;SCKJ&quot;', $values['pt']);
    }

    public function test_home_page_exposes_database_texts_for_client_side_switching(): void
    {
        $response = $this->get(route('home'));

        $response
            ->assertOk()
            ->assertSee('data-i18n-values=', false)
            ->assertSee('data-i18n-attr="alt"', false)
            ->assertSee('data-i18n-attr="textContent"', false);
    }

    public function test_public_pages_render_with_client_side_translation_attributes(): void
    {
        foreach (['about', 'services', 'commerce', 'faq', 'contacts', 'portfolio.index'] as $routeName) {
            $this->get(route($routeName))
                ->assertOk()
                ->assertSee('data-i18n-values=', false);
        }
    }
}
