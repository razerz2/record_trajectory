<?php

use App\Http\Controllers\Auth\LoginController;

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

//Auth::routes();
Route::get('/', [LoginController::class, 'showLoginForm']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/loginAuth', [LoginController::class, 'login'])->name('loginAuth');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('colaboradores')->group(function () {
    Route::group(['middleware' => 'checkUserRole'], function () {
        // Rotas para usuários regulares
        Route::get('/dashboard', 'HomeController@index')->name('colaboradores.dashboard');
        //Rota de trajetos para colaboradores...
        Route::resource('trajetos', 'TrajetosController')->except(['destroy', 'edit', 'update']);
        //Rota de despesas para colaboradores...
        Route::resource('despesas', 'DespesasController')->except(['destroy', 'edit', 'update']);
        //Rotas de Utilitários...
        Route::get('getKMAtual/{user_id}', 'VeiculoController@obterKm')->name('getKMAtual');
    });
    
});

Route::prefix('admin')->group(function () {
    Route::group(['middleware' => 'admin'], function () {
        // Rotas que requerem permissão de administrador
        Route::get('/dashboard', 'HomeAdminController@index')->name('admin.dashboard');
        // Rotas  de Administrador sobre Usuário...
        Route::resource('usuarios', 'UserController');
        Route::get('/usuario/editPassword/{id}', 'UserController@editPassword')->name('usuarios.editPassword');
        Route::post('/usuario/EditarPassword/{id}', 'userController@updatePassword')->name('usuarios.changePassword');
        Route::post('/usuario/desativar/', 'UserController@desativar')->name('usuarios.desativar');
        // Rotas de Administrador sobre Veículos...
        Route::resource('veiculos', 'VeiculoController');
        Route::resource('userVeiculos', 'UserVeiculoController');
        Route::get('getVeiculosForUser/{user_id}', 'UserVeiculoController@getVeiculosForUser')->name('getVeiculosForUser');
        Route::get('getVeiculosNotAssociados/{user_id}', 'UserVeiculoController@getVeiculosNotAssociados')->name('getVeiculosNotAssociados');
        Route::post('/veiculos/desativar/', 'VeiculoController@desativar')->name('veiculos.desativar');
        // Rotas de Administrador sobre Locais...
        Route::resource('locais', 'locaisController');
        Route::get('getCidades/{estado_id}', 'CidadesController@getCidades')->name('getCidades');
        // Rotas de Administrador sobre Percursos...
        Route::resource('percursos', 'PercursoController');
        // Rotas de Administrador sobre gastos...
        Route::resource('gastos', 'GastosController');

    });
});



  








