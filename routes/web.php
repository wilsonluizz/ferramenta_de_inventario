<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Rotas gerais

// ROTA DE AUTENTICAÇÃO
Auth::routes(
    [
        'register'  => true,        // Desabilita o autocadastro
        'verify'    => false,        // Desabilita a verificação de e-mail
    ]
);

// ROTA DA RAIZ DO APLICATIVO E CONTROLE DE LOGIN
Route::get('/', function () {
    if (Auth::guest())
        return redirect('login');   // Se não está logado, envia para tela de login
    else
        return redirect('home');    // Se está logado, envia para home
});


// DAQUI PARA BAIXO, APENAS SE TIVER AUTENTICADO!
// Todas precisam ser autenticadas (Middleware: auth)
Route::group(['middleware' => ['auth']], function () {

    // CONTROLE DA PÁGINA INICIAL (HOME)
    Route::get('/home', [App\Http\Controllers\LocalidadeController::class, 'index'])->name('home');
});

Route::resource('centros-de-custo', 'App\Http\Controllers\CentroDeCustoController');
    Route::resource('localidades', 'App\Http\Controllers\LocalidadeController');
    Route::resource('inventario', 'App\Http\Controllers\InventarioController');
    Route::resource('equipamentos', 'App\Http\Controllers\EquipamentoController');
    Route::resource('responsaveis', 'App\Http\Controllers\ResponsavelController');
    Route::resource('notas-fiscais', 'App\Http\Controllers\NotaFiscalController');
    Route::resource('user', 'App\Http\Controllers\UsuarioSolicitanteController');
    Route::resource('adm-emprestimos', 'App\Http\Controllers\EmprestimoAdmController');


    // Equipamentos
    Route::resource('equipamentos/{id}/historicos', 'App\Http\Controllers\HistoricoController', ['name' => ['index' => 'historico.index']]);
    Route::resource('equipamentos/{id}/movimentacao', 'App\Http\Controllers\MovimentacaoController', ['names' => [
        'index' => 'movimentacao.index',
        'create' => 'movimentacao.create',
        'store' => 'movimentacao.store',
        'show' => 'movimentacao.show',
        'edit' => 'movimentacao.edit',
        'update' => 'movimentacao.update',
        'destroy' => 'movimentacao.destroy'
    ]]);

    Route::resource('emprestimos', 'App\Http\Controllers\EmprestimoClienteController');



    // Dashboard
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');


    // Rota de gerenciamento dos próprios dados
    Route::resource('self', 'App\Http\Controllers\SelfController');

    // Rotas de administração
    // Todas as rotas abaixo possuem o 'prefixo' /admin/
    Route::prefix('admin')->group(function () {

        // As rotas dentro desse grupo precisam ter passado por autenticação 
        // e ter regra (role) de administração (can: admin)
        Route::group(['middleware' => ['can:admin']], function () {

            // Página inicial de administração. Conteúdo depende do nível de permissão
            Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');

            // Administração de usuários
            Route::resource('usuarios', 'App\Http\Controllers\UserController');

            // Administração de perfis (roles)
            Route::resource('perfis', 'App\Http\Controllers\RoleController');


            /**
             * PERSONALIZAÇÃO DO SISTEMA DE INVENTÁRIO 
             */            

            // Administração de marcas
            Route::resource('marca', 'App\Http\Controllers\MarcaController');

            // Administração de categorias
            Route::resource('categoria', 'App\Http\Controllers\CategoriaController');

            // Administração de tipos de equipamentos
            Route::resource('tipo', 'App\Http\Controllers\TipoController');

            // Administração de centros de equipamentos
            Route::resource('centros-de-custo', 'App\Http\Controllers\CentroDeCustoController');
        });


        // As rotas dentro desse grupo precisam ter passado por autenticação 
        // e ter permissão de desenvolvedor (can: dev)
        Route::group(['middleware' => ['can:dev']], function () {
            Route::resource('permissoes', 'App\Http\Controllers\PermsController');
        });
    });
// });

Auth::routes();
