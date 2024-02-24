<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCidade extends Model
{
    use HasFactory;
    public static $snakeAttributes = false;
    protected $fillable = [
        'cidade_id',
        'user_id',
        'user_cidade_sta',

    ];

    protected $primaryKey = 'user_cidade_id';

    protected $table = 'user_cidade';

    public function cidade(){
        return $this->hasOne(Cidade::class, 'cidade_id', 'cidade_id');
    }

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public static function listar($request = null){

        $dados = self::with([
            'cidade',
            'user'
        ])->select('user_cidade.*');

        $dados = $dados
            ->join('cidade', 'user_cidade.cidade_id', '=', 'cidade.cidade_id')
            ->join('users', 'user_cidade.user_id', '=', 'users.id');

        if($request != null){

            $user_cidade_id = isset($request['user_cidade_id']) ? $request['user_cidade_id'] : null;
            $cidade_id = isset($request['cidade_id']) ? $request['cidade_id'] : null;
            $user_id = isset($request['user_id']) ? $request['user_id'] : null;
            $user_cidade_sta = isset($request['user_cidade_sta']) ? $request['user_cidade_sta'] : null;

            $dados = $dados
                ->when($user_cidade_id, function($query, $campo){
                    return $query->where('user_cidade_id', '=', $campo);
                })
                ->when($cidade_id, function($query, $campo){
                    return $query->where('cidade_id', '=', $campo);
                })
                ->when($user_id, function($query, $campo){
                    return $query->where('user_id', '=', $campo);
                })
                ->when($user_cidade_sta, function($query, $campo){
                    return $query->where('user_cidade_sta', '=', $campo);
                })
                ;

        }

        $dados = $dados
            ->orderBy('name', 'ASC')
            ->orderBy('cidade_nome', 'ASC')
            ->paginate('51');

        return $dados;
    }

    public static function store($request){
        try{
            $id = isset($request['user_cidade_id']) ? $request['user_cidade_id'] : null;
            $cidade_id = $request['cidade_id'];
            $user_id = $request['user_id'];
            $user_cidade_sta = isset($request['user_cidade_sta']) ? $request['user_cidade_sta'] : 1;

            if($id == null){

                $id = self::create([
                    'cidade_id' => $cidade_id,
                    'user_id' => $user_id,
                    'user_cidade_sta' => $user_cidade_sta
                ])->user_cidade_id;

            }
            else{
                self::where('user_cidade_id', $id)
                    ->update([
                        'cidade_id' => $cidade_id,
                        'user_id' => $user_id,
                        'user_cidade_sta' => $user_cidade_sta
                    ]);
            }

            $retorno[] =[
                'erro' => 1,
                'mensagem' => 'Inserido/atualizado com sucesso!',
                'id' => $id
            ];

        }catch(\Exception $e){
            $retorno[] =[
                'erro' => 0,
                'mensagem' => 'Erro ao inserir/atualizar usuário na cidade! ' . $e->getMessage()
            ];
        }

        return $retorno;

    }

    public static function destroy($request){
        try{
            $id = $request['user_cidade_id'];

            self::where('user_cidade_id', $id)
                ->delete();

            $retorno[] =[
                'erro' => 1,
                'mensagem' => 'Removido com sucesso!',
                'id' => $id
            ];

        }catch(\Exception $e){
            $retorno[] =[
                'erro' => 0,
                'mensagem' => 'Erro ao remover usuário da cidade!'
            ];
        }

        return $retorno;

    }
}
