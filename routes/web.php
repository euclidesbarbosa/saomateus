<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ComandosController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FuncaoController;
use App\Http\Controllers\CensoController;
use App\Http\Controllers\UfController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\ClienteDocController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\DomicilioController;
use App\Http\Controllers\PesquisaController;
use App\Http\Controllers\UnicoController;
use App\Http\Controllers\AtendimentoController;
use App\Http\Controllers\PessoaSituacaoController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\FileEntryController;
use \App\Http\Controllers\MenuPerfilController;
use \App\Http\Controllers\MenuPerfilUserController;
use App\Http\Controllers\CulturaNewController;
use App\Http\Controllers\BancoDeDadosBackupController;
use App\Http\Controllers\EstabelecimentoController;
use App\Http\Controllers\UserCidadeController;
use App\Http\Controllers\RelatorioController;
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
//

Auth::routes(['register' => false]);

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::prefix('tipo')->group(function(){
   Route::get('index/{p1}',[TipoController::class, 'index']);
   Route::get('atualizaTipo',[TipoController::class, 'atualizaTipo']);
   Route::post('listar',[TipoController::class, 'listar']);
   Route::post('listarT',[TipoController::class, 'listarT']);
   Route::get('listarPaginate/{page}',[TipoController::class, 'listar']);
   Route::post('listarMassa',[TipoController::class, 'listarMassa']);
   Route::post('store',[TipoController::class, 'store']);
   Route::post('excluir',[TipoController::class, 'excluir']);
   Route::get('storeMenus',[TipoController::class, 'storeMenus']);
   Route::post('listarPerfil',[TipoController::class, 'listarPerfil']);
});

Route::prefix('user')->group(function(){
   Route::get('index', [UserController::class, 'index']);
   Route::post('listar', [UserController::class, 'listar']);
   Route::post('store', [UserController::class, 'store']);
   Route::post('excluir', [UserController::class, 'excluir']);
   Route::get('indexMudaSenha', [UserController::class, 'indexMudaSenha']);
   Route::post('mudasenha', [UserController::class, 'mudasenha']);
});

Route::prefix('cliente')->group(function(){
   Route::get('index', [ClienteController::class, 'index']);
   Route::post('store', [ClienteController::class, 'store']);
   Route::post('listar', [ClienteController::class, 'listar']);
   Route::post('excluir', [ClienteController::class, 'excluir']);
});

Route::prefix('cliente_doc')->group(function(){
   Route::get('index', [ClienteDocController::class, 'index']);
   Route::post('store', [ClienteDocController::class, 'store']);
   Route::post('listar', [ClienteDocController::class, 'listar']);
   Route::post('excluir', [ClienteDocController::class, 'excluir']);
});

Route::prefix('funcao')->group(function(){
   Route::get('index', [FuncaoController::class, 'index']);
   Route::post('store', [FuncaoController::class, 'store']);
   Route::post('listar', [FuncaoController::class, 'listar']);
   Route::post('excluir', [FuncaoController::class, 'excluir']);
});

Route::prefix('comandos')->group(function(){
   Route::get('index', [ComandosController::class, 'index']);
   Route::post('exec', [ComandosController::class, 'exec']);
   Route::get('mudaBanco', [ComandosController::class, 'mudaBanco']);
});

Route::prefix('censo')->group(function(){
    Route::get('index', [CensoController::class, 'index']);
    Route::post('store', [CensoController::class, 'store']);
    Route::post('listar', [CensoController::class, 'listar']);
    Route::post('excluir', [CensoController::class, 'excluir']);
});

Route::prefix('uf')->group(function(){
    Route::get('index', [UfController::class, 'index']);
    Route::post('store', [UfController::class, 'store']);
    Route::post('listar', [UfController::class, 'listar']);
    Route::post('excluir', [UfController::class, 'excluir']);
});

Route::prefix('cidade')->group(function(){
    Route::get('index', [CidadeController::class, 'index']);
    Route::post('store', [CidadeController::class, 'store']);
    Route::post('listar', [CidadeController::class, 'listar']);
    Route::post('excluir', [CidadeController::class, 'excluir']);
});

Route::prefix('pessoa')->group(function(){
    Route::post('listar', [PessoaController::class, 'listar']);
    Route::post('listarX', [PessoaController::class, 'listarX']);
    Route::post('store', [PessoaController::class, 'store']);
    Route::post('listarP', [PessoaController::class, 'listarP']);
    Route::post('listarP1', [PessoaController::class, 'listarP1']);
    Route::post('listarP2', [PessoaController::class, 'listarP2']);
    Route::post('listarResumo', [PessoaController::class, 'listarResumo']);
    Route::get('rotinaInclusaoMassa', [PessoaController::class, 'rotinaInclusaoMassa']);
    Route::get('rotinaAtualizacaoMassa', [PessoaController::class, 'rotinaAtualizacaoMassa']);
    Route::get('indexLocalidade', [PessoaController::class, 'indexLocalidade']);
    Route::get('indexHomonimos', [PessoaController::class, 'indexHomonimos']);
    Route::post('rotinaSubstituicaoDuplicados', [PessoaController::class, 'rotinaSubstituicaoDuplicados']);
});

Route::prefix('domicilio')->group(function(){
    Route::post('store', [DomicilioController::class, 'store']);
    Route::post('listar', [DomicilioController::class, 'listar']);
    Route::post('excluir', [DomicilioController::class, 'excluir']);
});

Route::prefix('pesquisa')->group(function(){
    Route::get('index', [PesquisaController::class, 'index']);
});

Route::prefix('atendimento')->group(function(){
    Route::post('store', [AtendimentoController::class, 'store']);
    Route::post('listar', [AtendimentoController::class, 'listar']);
    Route::post('excluir', [AtendimentoController::class, 'excluir']);
});

Route::prefix('unico')->group(function(){
    Route::get('index', [UnicoController::class, 'index']);
    Route::post('store', [UnicoController::class, 'store']);
    Route::post('listar', [UnicoController::class, 'listar']);
    Route::post('excluir', [UnicoController::class, 'excluir']);
});

Route::prefix('pessoaSituacao')->group(function(){
    Route::get('index', [PessoaSituacaoController::class, 'index']);
    Route::post('store', [PessoaSituacaoController::class, 'store']);
    Route::post('listar', [PessoaSituacaoController::class, 'listar']);
    Route::post('excluir', [PessoaSituacaoController::class, 'excluir']);
});

Route::prefix('aluno')->group(function(){
    Route::get('rotinaInclusaoMassaAlunos', [AlunoController::class, 'rotinaInclusaoMassaAlunos']);
    Route::get('rotinaInclusaoMassaAlunosF', [AlunoController::class, 'rotinaInclusaoMassaAlunosF']);
    Route::get('rotinaAtualizaPessoa', [AlunoController::class, 'rotinaAtualizaPessoa']);
});

Route::prefix('upload')->group(function(){
    Route::post('uploadFile', [FileEntryController::class, 'uploadFile']);
});

Route::prefix('menuPerfil')->group(function(){
    Route::get('index', [MenuPerfilController::class, 'index']);
    Route::post('store', [MenuPerfilController::class, 'store']);
    Route::post('listar', [MenuPerfilController::class, 'listar']);
    Route::post('listarMenu', [MenuPerfilController::class, 'listarMenu']);
    Route::post('excluir', [MenuPerfilController::class, 'excluir']);
});

Route::prefix('menuPerfilUser')->group(function(){
    Route::get('index', [MenuPerfilUserController::class, 'index']);
    Route::post('store', [MenuPerfilUserController::class, 'store']);
    Route::post('listar', [MenuPerfilUserController::class, 'listar']);
    Route::post('excluir', [MenuPerfilUserController::class, 'excluir']);
});

Route::prefix('culturaNew')->group(function(){
    Route::get('index', [CulturaNewController::class, 'index']);
});

Route::prefix('banco')->group(function(){
    Route::get('bancobackup', [BancoDeDadosBackupController::class, 'bancoBackup']);
});

Route::prefix('estabelecimento')->group(function(){
    Route::get('index', [EstabelecimentoController::class, 'index']);
    Route::post('store', [EstabelecimentoController::class, 'store']);
    Route::post('listar', [EstabelecimentoController::class, 'listar']);
    Route::post('excluir', [EstabelecimentoController::class, 'excluir']);
});

Route::prefix('userCidade')->group(function(){
    Route::get('index', [UserCidadeController::class, 'index']);
    Route::post('store', [UserCidadeController::class, 'store']);
    Route::post('listar', [UserCidadeController::class, 'listar']);
    Route::post('excluir', [UserCidadeController::class, 'excluir']);
});
 
Route::prefix('relacao')->group(function(){
    Route::get('index', [RelatorioController::class, 'index']);
});