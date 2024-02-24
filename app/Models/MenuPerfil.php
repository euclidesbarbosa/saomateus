<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class MenuPerfil extends Model
{
    use HasFactory;

    public static $snakeAttributes = false;

    protected $fillable = [
        'tipo_menu_id',
        'tipo_perfil_id',
        'menu_perfil_sta'
    ];

    protected $primaryKey = 'menu_perfil_id';

    protected $table = 'menu_perfil';

    public function tipoMenu(){
        return $this->hasOne(Tipo::class, 'tipo_id', 'tipo_menu_id');
    }

    public function tipoPerfil(){
        return $this->hasOne(Tipo::class, 'tipo_id', 'tipo_perfil_id');
    }

    public function menuPerfilUser(){
        return $this->hasMany(MenuPerfilUser::class, 'menu_perfil_id', 'menu_perfil_id')
            ->where('user_id', '=', Auth::id());
    }

    public static function listar($request = null){

        $dados = self::with([
            'tipoMenu',
            'tipoMenu.tipoPai',
            'tipoPerfil',
            'menuPerfilUser',
        ])->select('menu_perfil.*')
        ->join('tipo as menu', 'menu_perfil.tipo_menu_id', '=', 'menu.tipo_id');

        if($request != null){

            $menu_perfil_id = isset($request['menu_perfil_id']) ? $request['menu_perfil_id'] : null;
            $tipo_perfil_id = isset($request['tipo_perfil_id']) ? $request['tipo_perfil_id'] : null;
            $tipo_menu_id = isset($request['tipo_menu_id']) ? $request['tipo_menu_id'] : null;
            $menu_perfil_sta = isset($request['menu_perfil_sta']) ? $request['menu_perfil_sta'] : null;
            $menu = isset($request['menu']) ? $request['menu'] : null;

            if($tipo_perfil_id == null){

                if(Auth::user() != null) {
                    $tipo_perfil_id = Auth::user()['tipo_perfil_id'];
                }
                else{
                    return null;
                }

            }

            $dados = $dados
                ->when($menu, function($query){
                    return $query->whereNull('menu.tipo_id_1');
                })
                ->when($menu_perfil_id, function($query, $campo){
                    return $query->where('menu_perfil_id', '=', $campo);
                })
                ->when($tipo_perfil_id, function($query, $campo){
                    return $query->where('tipo_perfil_id', '=', $campo);
                })
                ->when($tipo_menu_id, function($query, $campo){
                    return $query->where('tipo_menu_id', '=', $campo);
                })
                ->when($menu_perfil_sta, function($query, $campo){
                    return $query->where('menu_perfil_sta', '=', $campo);
                })
            ;
        }

        $dados = $dados
            ->orderBy('tipo_ordem', 'ASC')
            ->orderBy('tipo_nome', 'ASC')
            ->get();

        return $dados;
    }

    public static function listarMenu($request = null){

        $dados = self::with([
            'tipoMenu',
            'tipoMenu.tipoPai',
            'tipoPerfil',
            'menuPerfilUser',
        ])->select('menu_perfil.*')
        ->join('tipo as menu', 'menu_perfil.tipo_menu_id', '=', 'menu.tipo_id');

        if($request != null){

            $menu_perfil_id = isset($request['menu_perfil_id']) ? $request['menu_perfil_id'] : null;
            $tipo_perfil_id = isset($request['tipo_perfil_id']) ? $request['tipo_perfil_id'] : null;
            $tipo_menu_id = isset($request['tipo_menu_id']) ? $request['tipo_menu_id'] : null;
            $menu_perfil_sta = isset($request['menu_perfil_sta']) ? $request['menu_perfil_sta'] : null;
            $menu = isset($request['menu']) ? $request['menu'] : null;

            if($tipo_perfil_id == null){

                if(Auth::user() != null) {
                    $tipo_perfil_id = Auth::user()['tipo_perfil_id'];
                }
                else{
                    return null;
                }

            }

            $dados = $dados
                ->when($menu, function($query){
                    return $query->whereNull('menu.tipo_id_1');
                })
                ->when($menu_perfil_id, function($query, $campo){
                    return $query->where('menu_perfil.menu_perfil_id', '=', $campo);
                })
                ->when($tipo_perfil_id, function($query, $campo){
                    return $query->where('tipo_perfil_id', '=', $campo);
                })
                ->when($tipo_menu_id, function($query, $campo){
                    return $query->where('tipo_menu_id', '=', $campo);
                })
                ->when($menu_perfil_sta, function($query, $campo){
                    return $query->where('menu_perfil_sta', '=', $campo);
                })
            ;
        }

        $dados = $dados
            ->orderBy('tipo_ordem', 'ASC')
            ->orderBy('tipo_nome', 'ASC')
            ->get();

        //verifica se o usuário tem um menu específico
        foreach ($dados as $row){

            //se menuPerfilUser != null é porque o usuário usará submenus específicos
            if(count($row['menuPerfilUser']) > 0){

                $dados = self::with([
                    'tipoMenu',
                    'tipoMenu.tipoPai',
                    'tipoPerfil',
                    'menuPerfilUser',
                ])->select('menu_perfil.*')
                    ->join('tipo as menu', 'menu_perfil.tipo_menu_id', '=', 'menu.tipo_id')
                    ->join('menu_perfil_user', 'menu_perfil.menu_perfil_id', '=', 'menu_perfil_user.menu_perfil_id')
                    ->join('users', 'menu_perfil_user.user_id','=', 'users.id')
                    ->where('id', '=', Auth::id())
                    ->orderBy('tipo_ordem', 'ASC')
                    ->orderBy('tipo_nome', 'ASC')
                    ->get();

                break;

            }

        }

        return $dados;

    }

    public static function store($request){

        try{

            $id = isset($request['menu_perfil_id']) ? $request['menu_perfil_id'] : null;
            $tipo_perfil_id = isset($request['tipo_perfil_id']) ? $request['tipo_perfil_id'] : null;
            $tipo_menu_id = isset($request['tipo_menu_id']) ? $request['tipo_menu_id'] : null;
            $menu_perfil_sta = isset($request['menu_perfil_sta']) ? $request['menu_perfil_sta'] : null;

            if($id == null){

                $id = self::create([
                    'tipo_perfil_id' => $tipo_perfil_id,
                    'tipo_menu_id' => $tipo_menu_id,
                    'menu_perfil_sta' => $menu_perfil_sta,
                ])->menu_perfil_id;

            }
            else{
                self::where('menu_perfil_id', $id)
                    ->update([
                        'tipo_perfil_id' => $tipo_perfil_id,
                        'tipo_menu_id' => $tipo_menu_id,
                        'menu_perfil_sta' => $menu_perfil_sta,
                    ]);
            }

            $retorno[] =[
                'erro' => 1,
                'mensagem' => 'Inserido/Atualizado com sucesso!',
                'id' => $id
            ];

        }catch(\Exception $e){

            $retorno[] =[
                'erro' => 0,
                'mensagem' => 'Erro ao Inserir/Atualizar! (' . $e->getMessage() . ')',
                'id' => $id
            ];

        }

        return $retorno;

    }

    public static function destroy($request){

        try{

            $id = $request['menu_perfil_id'];
            self::where('menu_perfil_id', $id)
                ->delete();

            $retorno[] =[
                'erro' => 1,
                'mensagem' => 'Removido com sucesso!',
                'id' => $id
            ];

        }catch(\Exception $e){

            $retorno[] =[
                'erro' => 0,
                'mensagem' => 'Erro ao remover!',
                'id' => $id
            ];

        }

        return $retorno;

    }
}
