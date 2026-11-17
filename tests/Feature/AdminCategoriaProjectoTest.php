<?php

namespace Tests\Feature;

use App\Models\CategoriaProjecto;
use App\Models\Portfolio;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminCategoriaProjectoTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_edit_and_delete_categories(): void
    {
        $admin = $this->admin();

        $this->actingAs($admin)
            ->post(route('admin.categorias.store'), ['nome' => 'Web Design'])
            ->assertRedirect(route('admin.categorias.index'))
            ->assertSessionHas('sucesso');

        $categoria = CategoriaProjecto::where('nome', 'Web Design')->firstOrFail();

        $this->get(route('admin.categorias.index'))
            ->assertOk()
            ->assertSee('Web Design');

        $this->put(route('admin.categorias.update', $categoria), ['nome' => 'Design Web'])
            ->assertRedirect(route('admin.categorias.index'));

        $this->assertDatabaseHas('categoria_projectos', [
            'id' => $categoria->id,
            'nome' => 'Design Web',
        ]);

        $this->delete(route('admin.categorias.destroy', $categoria))
            ->assertRedirect(route('admin.categorias.index'));

        $this->assertDatabaseMissing('categoria_projectos', ['id' => $categoria->id]);
    }

    public function test_category_name_must_be_unique(): void
    {
        $admin = $this->admin();
        CategoriaProjecto::create(['nome' => 'Web Design']);

        $this->actingAs($admin)
            ->from(route('admin.categorias.create'))
            ->post(route('admin.categorias.store'), ['nome' => 'Web Design'])
            ->assertRedirect(route('admin.categorias.create'))
            ->assertSessionHasErrors('nome');

        $this->assertSame(1, CategoriaProjecto::where('nome', 'Web Design')->count());
    }

    public function test_new_category_is_available_in_portfolio_create_select(): void
    {
        $admin = $this->admin();
        $categoria = CategoriaProjecto::create(['nome' => 'Aplicações Móveis']);

        $this->actingAs($admin)
            ->get(route('admin.portfolio.create'))
            ->assertOk()
            ->assertSee('name="categoria_projecto_id"', false)
            ->assertSee('value="'.$categoria->id.'"', false)
            ->assertSee('Aplicações Móveis');
    }

    public function test_portfolio_store_saves_the_selected_category(): void
    {
        $admin = $this->admin();
        $categoria = CategoriaProjecto::create(['nome' => 'E-commerce']);

        $this->actingAs($admin)
            ->post(route('admin.portfolio.store'), [
                'title' => 'Loja Online',
                'categoria_projecto_id' => $categoria->id,
                'description' => 'Projeto de teste.',
            ])
            ->assertRedirect(route('admin.portfolio.index'));

        $this->assertDatabaseHas('portfolios', [
            'title' => 'Loja Online',
            'categoria_projecto_id' => $categoria->id,
            'category' => 'E-commerce',
            'created_by' => $admin->id,
        ]);
    }

    public function test_deleting_category_clears_the_portfolio_reference(): void
    {
        $admin = $this->admin();
        $categoria = CategoriaProjecto::create(['nome' => 'Web Design']);
        $portfolio = Portfolio::create([
            'title' => 'Site institucional',
            'slug' => 'site-institucional',
            'category' => 'Web Design',
            'categoria_projecto_id' => $categoria->id,
            'description' => 'Projeto de teste.',
            'status' => true,
            'featured' => false,
            'approval_status' => 'aprovado',
        ]);

        $this->actingAs($admin)
            ->delete(route('admin.categorias.destroy', $categoria))
            ->assertRedirect(route('admin.categorias.index'));

        $this->assertDatabaseMissing('categoria_projectos', ['id' => $categoria->id]);
        $this->assertDatabaseHas('portfolios', [
            'id' => $portfolio->id,
            'categoria_projecto_id' => null,
            'category' => 'Web Design',
        ]);
    }

    public function test_employee_cannot_manage_categories(): void
    {
        $funcionario = User::factory()->create([
            'role' => 'funcionario',
            'ativo' => true,
        ]);
        $categoria = CategoriaProjecto::create(['nome' => 'Web Design']);

        $this->actingAs($funcionario);

        $this->get(route('admin.categorias.index'))->assertForbidden();
        $this->get(route('admin.categorias.create'))->assertForbidden();
        $this->post(route('admin.categorias.store'), ['nome' => 'Outra'])->assertForbidden();
        $this->get(route('admin.categorias.edit', $categoria))->assertForbidden();
        $this->put(route('admin.categorias.update', $categoria), ['nome' => 'Outra'])->assertForbidden();
        $this->delete(route('admin.categorias.destroy', $categoria))->assertForbidden();

        $this->assertDatabaseHas('categoria_projectos', [
            'id' => $categoria->id,
            'nome' => 'Web Design',
        ]);
        $this->assertDatabaseMissing('categoria_projectos', ['nome' => 'Outra']);
    }

    private function admin(): User
    {
        return User::factory()->create([
            'role' => 'admin',
            'ativo' => true,
        ]);
    }
}
