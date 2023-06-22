<?php

use App\Http\Controllers\Admin\EmailController;
use App\Http\Controllers\Admin\FilialController;
use App\Http\Controllers\Admin\GrupoController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PermissaoController;
use App\Http\Controllers\Admin\SetorController;
use App\Http\Controllers\Admin\TipoDocumentoController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');


Route::get('/emails', [EmailController::class, 'index'])->middleware('auth')->name('emails.index');
Route::get('/emails/search', [EmailController::class, 'search'])->middleware('auth')->name('emails.search');
Route::get('/emails/create', [EmailController::class, 'create'])->middleware('auth')->name('emails.create');
Route::any('/emails/store', [EmailController::class, 'store'])->middleware('auth')->name('emails.store');
Route::get('/emails/{id}/edit', [EmailController::class, 'edit'])->middleware('auth')->name('emails.edit');
Route::any('/emails/{id}/update', [EmailController::class, 'update'])->middleware('auth')->name('emails.update');
Route::get('/emails/{id}/show', [EmailController::class, 'show'])->middleware('auth')->name('emails.show');
Route::get('/emails/{id}/destroy', [EmailController::class, 'destroy'])->middleware('auth')->name('emails.destroy');

Route::get('/setores', [SetorController::class, 'index'])->middleware('auth')->name('setores.index');
Route::get('/setores/search', [SetorController::class, 'search'])->middleware('auth')->name('setores.search');
Route::get('/setores/create', [SetorController::class, 'create'])->middleware('auth')->name('setores.create');
Route::any('/setores/store', [SetorController::class, 'store'])->middleware('auth')->name('setores.store');
Route::get('/setores/{id}/edit', [SetorController::class, 'edit'])->middleware('auth')->name('setores.edit');
Route::any('/setores/{id}/update', [SetorController::class, 'update'])->middleware('auth')->name('setores.update');
Route::get('/setores/{id}/show', [SetorController::class, 'show'])->middleware('auth')->name('setores.show');
Route::get('/setores/{id}/destroy', [SetorController::class, 'destroy'])->middleware('auth')->name('setores.destroy');

// Filial
Route::get('/filials', [FilialController::class, 'index'])->middleware('auth')->name('filials.index');
Route::get('/filials/search', [FilialController::class, 'search'])->middleware('auth')->name('filials.search');
Route::get('/filials/create', [FilialController::class, 'create'])->middleware('auth')->name('filials.create');
Route::any('/filials/store', [FilialController::class, 'store'])->middleware('auth')->name('filials.store');
Route::get('/filials/{id}/edit', [FilialController::class, 'edit'])->middleware('auth')->name('filials.edit');
Route::any('/filials/{id}/update', [FilialController::class, 'update'])->middleware('auth')->name('filials.update');
Route::get('/filials/{id}/show', [FilialController::class, 'show'])->middleware('auth')->name('filials.show');
Route::get('/filials/{id}/destroy', [FilialController::class, 'destroy'])->middleware('auth')->name('filials.destroy');


// Tipos de documentos
Route::get('/tipoDocumentos', [TipoDocumentoController::class, 'index'])->middleware('auth')->name('tipoDocumentos.index');
Route::get('/tipoDocumentos/search', [TipoDocumentoController::class, 'search'])->middleware('auth')->name('tipoDocumentos.search');
Route::get('/tipoDocumentos/create', [TipoDocumentoController::class, 'create'])->middleware('auth')->name('tipoDocumentos.create');
Route::any('/tipoDocumentos/store', [TipoDocumentoController::class, 'store'])->middleware('auth')->name('tipoDocumentos.store');
Route::get('/tipoDocumentos/{id}/edit', [TipoDocumentoController::class, 'edit'])->middleware('auth')->name('tipoDocumentos.edit');
Route::any('/tipoDocumentos/{id}/update', [TipoDocumentoController::class, 'update'])->middleware('auth')->name('tipoDocumentos.update');
Route::get('/tipoDocumentos/{id}/show', [TipoDocumentoController::class, 'show'])->middleware('auth')->name('tipoDocumentos.show');
Route::get('/tipoDocumentos/{id}/destroy', [TipoDocumentoController::class, 'destroy'])->middleware('auth')->name('tipoDocumentos.destroy');

// Grupos
Route::get('/grupos', [GrupoController::class, 'index'])->middleware('auth')->name('grupos.index');
Route::get('/grupos/search', [GrupoController::class, 'search'])->middleware('auth')->name('grupos.search');
Route::get('/grupos/create', [GrupoController::class, 'create'])->middleware('auth')->name('grupos.create');
Route::any('/grupos/store', [GrupoController::class, 'store'])->middleware('auth')->name('grupos.store');
Route::get('/grupos/{id}/edit', [GrupoController::class, 'edit'])->middleware('auth')->name('grupos.edit');
Route::any('/grupos/{id}/update', [GrupoController::class, 'update'])->middleware('auth')->name('grupos.update');
Route::get('/grupos/{id}/show', [GrupoController::class, 'show'])->middleware('auth')->name('grupos.show');
Route::get('/grupos/{id}/destroy', [GrupoController::class, 'destroy'])->middleware('auth')->name('grupos.destroy');

// Permissões
Route::get('permissoes/{id}/index', [PermissaoController::class, 'index'])->middleware('auth')->name('permissoes.index');
Route::any('permissoes/{id}/store', [PermissaoController::class, 'store'])->middleware('auth')->name('permissoes.store');
Route::get('permissoes/{id}/edit', [PermissaoController::class, 'edit'])->middleware('auth')->name('permissoes.edit');
Route::any('permissoes/{id}/update', [PermissaoController::class, 'update'])->middleware('auth')->name('permissoes.update');
Route::get('permissoes/{id}/destroy', [PermissaoController::class, 'destroy'])->middleware('auth')->name('permissoes.destroy');

// User
Route::resource('usuarios', 'App\Http\Controllers\Admin\UserController');
Route::get('usuario/password', [UserController::class, 'password'])->middleware(['auth'])->name('usuario.password');
Route::any('usuario/password/update', [UserController::class, 'password_update'])->middleware(['auth'])->name('usuario.password.update');

// Rota de logout
Route::get('usuario/logout', 'App\Http\Controllers\Auth\AuthenticatedSessionController@destroy')->name('usuario.logout');


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
