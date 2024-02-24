<?php

namespace App\Models;

use App\Http\Controllers\UserCidadeController;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Testing\Fluent\Concerns\Has;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public static $snakeAttributes = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'user_nome',
        'email',
        'password',
        'user_tel',
        'tipo_perfil_id',
        'user_sta'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function perfil(){
        return $this->hasOne(Tipo::class, 'tipo_id', 'tipo_perfil_id');
    }

    public function funcoes(){
        return $this->hasMany(Funcao::class, 'user_id', 'id');
    }

    public function menuPerfilUser(){

        return $this->hasMany(MenuPerfilUser::class, 'user_id', 'id')
            ->where('menu_perfil_user_sta', '=', 1);

    }

    public function userCidade(){
        return $this->hasMany(UserCidade::class, 'user_id', 'id');
    }

    public static function login($request = null){

        try{

            $dados = self::with([
                'perfil',
            ]);

            if ($request != null) {

                $id         = isset($request['id']) ? $request['id'] : null;
                $name       = isset($request['name']) ? $request['name'] : null;
                $email      = isset($request['email']) ? $request['email'] : null;
                $password   = isset($request['password']) ? $request['password'] : null;

                $dados = $dados
                ->when($id, function ($query, $id) {
                    return $query->where('id', '=', $id);
                })
                ->when($name, function ($query, $name) {
                    return $query->where('name', '=', $name);
                })
                ->when($email, function ($query, $email) {
                    return $query->where('email', '=', $email);
                });

            }

            $dados = $dados
                ->get();

            if ($dados->count() != 0) {

                $pass = $dados[0]['password'];

                if (!Hash::check($password, $pass)) {

                    $retorno[] = [
                        'erro' => 0,
                        'mensagem' => 'Usuário ou senha inválida!'
                    ];

                }
                else{

                    $retorno[] = [
                        'erro' => 1,
                        'mensagem' => 'Acesso permitido!',
                        'data' => $dados
                    ];

                }

            }
            else{

                $retorno[] = [
                    'erro' => 0,
                    'mensagem' => 'Usuário ou senha inválida!'
                ];

            }
        }catch(\Exception $e){

            $retorno[] = [
                'erro' => 0,
                'mensagem' => 'Erro ao listar!'
            ];

        }

        return $retorno;

    }

    public static function listar($request = null){

        $dados = self::with([
            'perfil',
            'funcoes',
            'funcoes.tipoFuncao',
            'menuPerfilUser',
            'menuPerfilUser.menuPerfil',
            'menuPerfilUser.menuPerfil.tipoMenu',
            'userCidade',
            'userCidade.cidade',
        ]);

        if($request != null){

            $id = isset($request['id']) ? $request['id'] : null;
            $email = isset($request['email']) ? $request['email'] : null;
            $password = isset($request['password']) ? $request['password'] : null;
            $name = isset($request['name']) ? $request['name'] : null;
            $user_nome = isset($request['user_nome']) ? $request['user_nome'] : null;
            $tipo_perfil_id = isset($request['tipo_perfil_id']) ? $request['tipo_perfil_id'] : null;
            $tipo_perfil_min = isset($request['tipo_perfil_min']) ? $request['tipo_perfil_min'] : null;

            $dados = $dados
                ->when($id, function($query, $id){
                    return $query->where('id', '=', $id);
                })
                ->when($name, function($query, $name){
                    return $query->where('name', '=', $name);
                })
                ->when($user_nome, function($query, $user_nome){
                    return $query->where('user_nome', '=', $user_nome);
                })
                ->when($tipo_perfil_id, function($query, $tipo_perfil_id){
                    return $query->where('tipo_perfil_id', '=', $tipo_perfil_id);
                })
                ->when($tipo_perfil_min, function($query, $tipo_perfil_min){
                    return $query->where('tipo_perfil_id', '>=', $tipo_perfil_min);
                })
                ;

        }

        $dados = $dados
            ->orderBy('tipo_perfil_id', 'ASC')
            ->orderBy('name', 'ASC')
            ->paginate(5000);

        return $dados;
    }

    public static function store($request){
        try{

            $id = isset($request['id']) ? $request['id'] : null;
            $name = Str::upper(trim($request['name']));
            $user_nome = Str::lower(trim($request['user_nome']));
            $email = Str::lower(trim($request['email']));
            $tipo_perfil_id = $request['tipo_perfil_id'];
            $user_tel = isset($request['user_tel']) ? $request['user_tel'] : null;
            $user_sta = isset($request['user_sta']) ? $request['user_sta'] : 1;
            $password = isset($request['password']) ? $request['password'] : '123mudar';
            $muda_password = isset($request['muda_password']) ? $request['muda_password'] : null;
            $tipo_menu_id = isset($request['tipo_menu_id']) ? $request['tipo_menu_id'] : null;

            if(Auth::user()['tipo_perfil_id'] > $tipo_perfil_id){
                $retorno[] =[
                    'erro' => 0,
                    'mensagem' => 'Erro ao salvar usuário!'
                ];

                return $retorno;

            };

            $password = Hash::make($password);

            if($id == null){

                $id = self::create([
                    'name' => $name,
                    'user_nome' => $user_nome,
                    'email' => $email,
                    'user_tel' => $user_tel,
                    'password' => $password,
                    'tipo_perfil_id' => $tipo_perfil_id,
                    'user_sta' => $user_sta
                ]);
            }
            else{
                self::where('id', $id)
                    ->update([
                        'name' => $name,
                        'user_nome' => $user_nome,
                        'email' => $email,
                        'user_tel' => $user_tel,
                        'tipo_perfil_id' => $tipo_perfil_id,
                        'user_sta' => $user_sta
                    ]);
            }

            if($muda_password === 1){

                self::where('id', $id)
                    ->update(['password' => $password]);

            }

            $l = 1;

            //verifica se algum menu específico foi selecionado.
            if($tipo_menu_id != null){

                $menuPerfil = MenuPerfil::listar([
                    'tipo_menu_id' => $tipo_menu_id,
                    'tipo_perfil_id' => $tipo_perfil_id,
                    'menu_perfil_sta' => 1,
                ]);

                if($menuPerfil->count() != 0){

                    $l = 2;
                    //VERIFICA se esse usuário já está em menu_perfil_user
                    $menuPerfilUser = MenuPerfilUser::listar([
                        'menu_perfil_id' => $menuPerfil[0]['menu_perfil_id'],
                        'user_id' => $id,
                        'menu_peril_user_sta' => 1
                    ]);

                    $l = 3;

                    if($menuPerfilUser->count() == 0){

                        $retorno = MenuPerfilUser::store([
                            'menu_perfil_id' => $menuPerfil[0]['menu_perfil_id'],
                            'user_id' => $id,
                            'menu_perfil_user_sta' => 1
                        ]);

                        if($retorno[0]['erro'] != 1){

                            return $retorno;

                        }

                        unset($retorno);

                    }

                }

            }

            $retorno[] =[
                'erro' => 1,
                'mensagem' => 'Usuário Inserido/Alterado com sucesso!',
                'id' => $id
            ];
        }catch(\Exception $e){
            $retorno[] =[
                'erro' => 0,
                'mensagem' => 'Erro ao inserir/alterar usuário! (' . $e->getMessage() . ')'
                . '<p>' . $l . '</p>'
            ];
        }

        return $retorno;

    }

    public static function destroy($request){
        try{

            $id = $request['id'];

            //verifica se o usuário já está para a tabela função
            $funcao = Funcao::listar([
                'user_id' => $id
            ]);

            if($funcao->count() != 0){

                self::where('id', $id)
                    ->update([
                        'user_sta' => 0,
                    ]);

            }
            else{

                self::where('id', $id)
                    ->delete();

            }

            $retorno[] =[
                'erro' => 1,
                'mensagem' => 'Usuário removido/desabilitado com sucesso!'
            ];

        }catch(\Exception $e){
            $retorno[] =[
                'erro' => 0,
                'mensagem' => 'Erro ao remover usuário!'
            ];
        }

        return $retorno;

    }

    public static function mudasenha($request){

        try{

            $id = isset($request['id']) ? $request['id'] : null;
            $password = $request['password'];
            $nPassword = $request['nPassword'];

            $user = self::listar([
                'id' => $id
            ]);

            if($user->count() == 0){

                $retorno[] =[
                    'erro' => 0,
                    'mensagem' => 'Usuário não cadastrado/logado!'
                ];

                return $retorno;

            }

            //verificação das senhas
            if(!Hash::check($password, $user[0]['password'])){

                $retorno[] =[
                    'erro' => 0,
                    'mensagem' => 'Usuário/Senha inválida!'
                ];

                return $retorno;

            }

            self::where('id', $id)
                ->update([
                    'password' => Hash::make($nPassword)
                ]);

            $retorno[] =[
                'erro' => 1,
                'mensagem' => 'Senha do usuário alterada com sucesso!'
            ];
        }catch(\Exception $e){
            $retorno[] =[
                'erro' => 0,
                'mensagem' => 'Erro ao atualizar a senha do usuário!' . $e->getMessage()
            ];
        }

        return $retorno;

    }
}
