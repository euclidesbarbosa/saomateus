<?php

namespace App\Http\Controllers;

use App\Models\FileEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FileEntryController extends Controller
{
    public function uploadFile(Request $request) {

        if($request->hasFile('file')){

            $file = $request->file('file');

            $pessoa_id = $request->input('pessoa_id');

            $tipo_doc_cod = $request->input('tipo_doc_cod');

            $tipo_doc = $request->input('tipo_doc');

            $filename = $file->getClientOriginalName();

//            $path = hash('sha256', time());

            $path = 'p' . str_repeat('0', 8 - strlen($pessoa_id)) . $pessoa_id;

            if (Storage::disk('uploads')->put($path . '/' . $filename, File::get($file))) {
                $input['pessoa_id'] = $pessoa_id;
                $input['tipo_doc_cod'] = $tipo_doc_cod;
                $input['tipo_doc'] = $tipo_doc;
                $input['filename'] = $filename;
                $input['mime'] = $file->getClientMimeType();
                $input['path'] = $path;
                $input['size'] = $file->getSize();
                $file = FileEntry::create($input);

                return response()->json([
                    'success' => true,
                    'id' => $file->id
                ], 200);
            }
        }

        return response()->json([
            'success' => false
        ], 500);

    }
}
