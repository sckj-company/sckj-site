<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\CategoriaProjectoController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\PortfolioController as AdminPortfolioController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SiteBlockController;
use App\Http\Controllers\Admin\SiteImageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

// ---------------------Troca de Idioma-----------------
Route::get('/idioma/{locale}', function (string $locale) {
    abort_unless(array_key_exists($locale, config('idiomas')), 404);
    session(['locale' => $locale]);

    return back();
})->name('idioma');
// ------------------------Fim--------------------------
// ---------------------Login----------------------------
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])
        ->middleware('throttle:5,1')
        ->name('login.store');
});

Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'ativo', 'role:admin,funcionario'])
    ->group(function () {
        Route::view('/', 'admin.dashboard')->name('dashboard');

        // Administrador e Funcionário
        Route::get('/minha-conta', [AccountController::class, 'edit'])->name('conta.edit');
        Route::put('/minha-conta', [AccountController::class, 'update'])->name('conta.update');

        Route::get('/mensagens', [ContactMessageController::class, 'index'])
            ->name('mensagens.index');
        Route::get('/mensagens/{mensagem}', [ContactMessageController::class, 'show'])
            ->name('mensagens.show');
        Route::patch('/mensagens/{mensagem}/respondida', [ContactMessageController::class, 'respondida'])
            ->name('mensagens.respondida');

        // Imagem
        Route::get('/imagens', [SiteImageController::class, 'index'])->name('imagens.index');
        Route::get('/imagens/{imagem}', [SiteImageController::class, 'edit'])->name('imagens.edit');
        Route::put('/imagens/{imagem}', [SiteImageController::class, 'update'])->name('imagens.update');
        Route::delete('/imagens/{imagem}', [SiteImageController::class, 'repor'])->name('imagens.repor');

        // Serviços
        Route::get('/servicos', [ServiceController::class, 'index'])->name('servicos.index');
        Route::get('/servicos/criar', [ServiceController::class, 'create'])->name('servicos.create');
        Route::post('/servicos', [ServiceController::class, 'store'])->name('servicos.store');
        Route::get('/servicos/{servico}/editar', [ServiceController::class, 'edit'])->name('servicos.edit');
        Route::put('/servicos/{servico}', [ServiceController::class, 'update'])->name('servicos.update');

        // Portfólio
        Route::resource('portfolio', AdminPortfolioController::class)
            ->except(['show', 'destroy']);

        // Só o Administrador
        Route::middleware('role:admin')->group(function () {
            // Serviço Aprovações
            Route::get('/aprovacoes', [ServiceController::class, 'aprovacoes'])->name('aprovacoes.index');
            Route::patch('/servicos/{servico}/aprovar', [ServiceController::class, 'aprovar'])->name('servicos.aprovar');
            Route::patch('/servicos/{servico}/rejeitar', [ServiceController::class, 'rejeitar'])->name('servicos.rejeitar');
            Route::delete('/servicos/{servico}', [ServiceController::class, 'destroy'])->name('servicos.destroy');

            // portfólio
            // Portfólio
            Route::delete('/portfolio/{portfolio}', [AdminPortfolioController::class, 'destroy'])
                ->name('portfolio.destroy');

            Route::get('/portfolio/aprovacoes', [AdminPortfolioController::class, 'aprovacoes'])
                ->name('portfolio.aprovacoes');

            Route::patch('/portfolio/{portfolio}/aprovar', [AdminPortfolioController::class, 'aprovar'])
                ->name('portfolio.aprovar');

            Route::patch('/portfolio/{portfolio}/rejeitar', [AdminPortfolioController::class, 'rejeitar'])
                ->name('portfolio.rejeitar');

            // Categorias de portfólio (só o Administrador)
            Route::resource('categorias', CategoriaProjectoController::class)
                ->parameters(['categorias' => 'categoriaProjecto'])
                ->except(['show']);

            // gestão de utilizadores
            Route::get('/utilizadores', [UserController::class, 'index'])->name('utilizadores.index');
            Route::get('/utilizadores/criar', [UserController::class, 'create'])->name('utilizadores.create');
            Route::post('/utilizadores', [UserController::class, 'store'])->name('utilizadores.store');
            Route::get('/utilizadores/{utilizador}/editar', [UserController::class, 'edit'])->name('utilizadores.edit');
            Route::put('/utilizadores/{utilizador}', [UserController::class, 'update'])->name('utilizadores.update');
            Route::patch('/utilizadores/{utilizador}/alternar', [UserController::class, 'alternar'])->name('utilizadores.alternar');
            Route::delete('/mensagens/{mensagem}', [ContactMessageController::class, 'destroy'])
                ->name('mensagens.destroy');
        });

        // Permissões para editar textos, páginas, imagens
        Route::get('/textos', [SiteBlockController::class, 'index'])->name('textos.index');
        Route::get('/textos/{pagina}', [SiteBlockController::class, 'edit'])
            ->where('pagina', '[a-z0-9_-]+')->name('textos.edit');
        Route::put('/textos/{pagina}', [SiteBlockController::class, 'update'])
            ->where('pagina', '[a-z0-9_-]+')->name('textos.update');

    });

// ----------------------------------------------------------------

// -----------------------Mensagens de Usuarios-----------

Route::get('/mensagens', [ContactMessageController::class, 'index'])->name('mensagens.index');
Route::get('/mensagens/{mensagem}', [ContactMessageController::class, 'show'])->name('mensagens.show');
Route::patch('/mensagens/{mensagem}/respondida', [ContactMessageController::class, 'respondida'])->name('mensagens.respondida');
// -----------------------Fim-----------------------------

// ------------------------Páginas--------------------------
Route::view('/', 'home')->name('home');
Route::view('/about', 'pages.about')->name('about');
Route::view('/commerce', 'pages.commerce')->name('commerce');
Route::view('/faq', 'pages.faq')->name('faq');
Route::view('/services', 'pages.services')->name('services');

// -------------------Contactos------------------------------
Route::view('/contacts', 'pages.contacts')->name('contacts');
Route::post('/contacts', [ContactController::class, 'enviar'])
    ->middleware('throttle:5,1')
    ->name('contacts.enviar');
// -------------------Fim Contactos---------------------------

// -------------------Portfolio------------------------------
Route::get('/portfolio', [PortfolioController::class, 'index'])
    ->name('portfolio.index');
// -------------------Fim Portfolio---------------------------
