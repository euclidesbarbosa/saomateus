<?php
namespace App\Http\Controllers;
use App\Http\Requests\RequestFileUploadStore;
use Illuminate\Http\Request;
use App\Models\FileUpload;
class FileController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function upload(RequestFileUploadStore $request){

        if($request->file()) {

            $file_name = time().'_'.$request->file->getClientOriginalName();

            $file_path = $request->file('file')->store('imgpet','public');
//            $file_path = $request->file('file')->storeAs('imgpet', $file_name);

            return FileUpload::store([
                'cliente_end_pet_id' => 1,
                'cliente_end_pet_nome' => $file_name,
                'cliente_end_pet_path' => '/imgpet/' . $file_name,
            ]);

        }
    }
}