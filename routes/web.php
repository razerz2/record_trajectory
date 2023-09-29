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
    });
    
});

Route::prefix('admin')->group(function () {
    Route::group(['middleware' => 'admin'], function () {
        // Rotas que requerem permissão de administrador
        Route::get('/dashboard', 'HomeAdminController@index')->name('admin.dashboard');

        Route::resource('usuarios', 'UserController');
        Route::get('/editPassword/{id}', 'UserController@editPassword')->name('usuarios.editPassword');
        Route::post('/EditarPassword/{id}', 'userController@updatePassword')->name('usuarios.changePassword');
        Route::post('/desativar/{id}', 'UserController@disableUser')->name('usuarios.desativar');

    });
});



  








