<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuPerfilUser extends Model
{
    use HasFactory;

    public static $snakeAttributes = false;

    protected $fillable = [
        'user_id',
        'menu_perfil_id',
        'menu_perfil_user_sta'
    ];

    protected $primaryKey = 'menu_perfil_user_id';

    protected $table = 'menu_perfil_user';

    public function menuPerfil(){
        return $this->hasOne(MenuPerfil::class, 'menu_perfil_id', 'menu_perfil_id');
    }

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public static function listar($request = null){

        $dados = self::with([
            'menuPerfil',
            'menuPerfil.tipoMenu',
            'menuPerfil.tipoMenu.tipoPai',
            'menuPerfil.tipoPerfil',
            'user',
            'user.perfil',
        ])->select('menu_perfil_user.*')
        ->join('menu_perfil', 'menu_perfil_user.menu_perfil_id', '=', 'menu_perfil.menu_perfil_id')
        ->join('tipo as tipoMenu', 'menu_perfil.tipo_menu_id', '=', 'tipoMenu.tipo_id');

        if($request != null){

            $menu_perfil_user_id = isset($request['menu_perfil_user_id']) ? $request['menu_perfil_user_id'] : null;
            $menu_perfil_id = isset($request['menu_perfil_id']) ? $request['menu_perfil_id'] : null;
            $user_id = isset($request['user_id']) ? $request['user_id'] : null;
            $menu_perfil_user_sta = isset($request['menu_perfil_user_sta']) ? $request['menu_perfil_user_sta'] : null;

            $dados = $dados
                ->when($menu_perfil_user_id, function($query, $campo){
                    return $query->where('menu_perfil_user_id', '=', $campo);
                })
                ->when($menu_perfil_id, function($query, $campo){
                    return $query->where('menu_perfil_user.menu_perfil_id', '=', $campo);
                })
                ->when($user_id, function($query, $campo){
                    return $query->where('menu_perfil_user.user_id', '=', $campo);
                })
                ->when($menu_perfil_user_sta, function($query, $campo){
                    return $query->where('menu_perfil_user_sta', '=', $campo);
                })
            ;
        }

        $dados = $dados
            ->orderBy('tipo_ordem', 'ASC')
            ->orderBy('tipo_nome', 'ASC')
            ->get();

        return $dados;
    }

    public static function store($request){

        try{

            $id = isset($request['menu_perfil_user_id']) ? $request['menu_perfil_user_id'] : null;
            $menu_perfil_id = isset($request['menu_perfil_id']) ? $request['menu_perfil_id'] : null;
            $user_id = isset($request['user_id']) ? $request['user_id'] : null;
            $menu_perfil_user_sta = isset($request['menu_perfil_user_sta']) ? $request['menu_perfil_user_sta'] : null;

            if($id == null){

                $id = self::create([
                    'menu_perfil_id' => $menu_perfil_id,
                    'user_id' => $user_id,
                    'menu_perfil_user_sta' => $menu_perfil_user_sta,
                ])->menu_perfil_user_id;

            }
            else{
                self::where('menu_perfil_user_id', $id)
                    ->update([
                        'menu_perfil_id' => $menu_perfil_id,
                        'user_id' => $user_id,
                        'menu_perfil_user_sta' => $menu_perfil_user_sta,
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
                'mensagem' => 'Erro ao Inserir/Atualizar!',
                'id' => $id
            ];

        }

        return $retorno;

    }

    public static function destroy($request){

        try{

            $id = $request['menu_perfil_user_id'];

            self::where('menu_perfil_user_id', $id)
                ->delete();

            $retorno[] =[
                'erro' => 1,
                'mensagem' => 'Removido com sucesso!'
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
