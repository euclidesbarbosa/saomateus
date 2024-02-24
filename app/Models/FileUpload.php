<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class FileUpload extends Model
{
    use HasFactory;
    protected $fillable = [
        'cliente_end_pet_nome',
        'cliente_end_pet_path',
        'cliente_end_pet_sta'
    ];

    protected $table = 'file_upload';

    protected $primaryKey = 'file_upload_id';

    public static function store($request){

        try{

            $id = self::create([
                'cliente_end_pet_nome' => $request['cliente_end_pet_nome'],
                'cliente_end_pet_path' => $request['cliente_end_pet_path'],
                'cliente_end_pet_sta' => 1,
            ])->file_upload_id;

            $retorno[] =[
                'erro' => 1,
                'mensagem' => 'Imagem do pet inserida!',
                'id' => $id
            ];

        }catch(\Exception $e){
            $retorno[] =[
                'erro' => 0,
                'mensagem' => 'Erro ao inserir imagem do pet!'
            ];
        }

        return $retorno;

    }
}