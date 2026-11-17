<?php

namespace Tests\Feature;

use App\Models\ContactMessage;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminDashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_renders_interaction_chart_from_contact_messages(): void
    {
        $this->travelTo('2026-11-17 12:00:00');
        $this->get(route('idioma', 'pt'))->assertRedirect();

        $admin = User::factory()->create([
            'role' => 'admin',
            'ativo' => true,
        ]);

        ContactMessage::factory()->count(2)->create([
            'created_at' => now()->subDays(2),
        ]);
        ContactMessage::factory()->create([
            'created_at' => now()->subMonths(2)->startOfMonth()->addDays(3),
        ]);
        ContactMessage::factory()->create([
            'created_at' => now()->subMonths(13),
        ]);

        $this->actingAs($admin)
            ->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee('Interações com o site')
            ->assertSee('Total de interações')
            ->assertSee('title="2026-11: 2"', false)
            ->assertSee('title="2026-09: 1"', false)
            ->assertDontSee('title="2025-10: 1"', false);
    }

    public function test_dashboard_shows_icons_without_role_badge(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
            'ativo' => true,
        ]);

        $this->actingAs($admin)
            ->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee('fa-gauge-high', false)
            ->assertSee('fa-file-lines', false)
            ->assertSee('fa-chart-line', false)
            ->assertSee('fa-right-from-bracket', false)
            ->assertDontSee('badge bg-secondary', false);
    }
}
