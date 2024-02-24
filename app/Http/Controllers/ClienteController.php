<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestClienteStore;
use App\Http\Requests\RequestFileUploadStore;
use App\Models\Cliente;
use App\Models\FileUpload;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class ClienteController extends Controller
{
    public function index(){
    return view('cliente');
}

    public function listar(Request $request){
        return Cliente::listar($request->input());
    }

    public function store(RequestClienteStore $request){

        return Cliente::store($request->input());
    }

    public function excluir(Request $request){

        return Cliente::destroy($request->input());

    }

    public function upload(RequestFileUploadStore $request){

        if($request->file()) {

//            $file_name = time().'_'.$request->file->getClientOriginalName();

            $file_name = $request->file('file')->store('clientes','public');

            $retorno[] = [
                'erro' => 1,
                'mensagem' => 'Imagem transferida com sucesso!',
                'imagem' => $file_name
            ];

            return $retorno;

            //PARA O CASO DE GRAVAR DIRETO NO BANCO
//            $path = storage_path('app/public/clientes');
//
//            if(!file_exists($path)){
//
//                $path = mkdir($path);
//
//            }
//
//            dd($file_name);
//
//            return FileUpload::store([
//                'cliente_end_pet_id' => 1,
//                'cliente_end_pet_nome' => $file_name,
//                'cliente_end_pet_path' => '/clientes/' . $file_name,
//            ]);

        }
    }

}
