<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;

class CurriculumService
{
    public function send(object $file, array $request) {
        if (!$file->isValid()) {
            return response()->json([
                'error' => 'O arquivo não foi enviado corretamente.'

            ], 400);

        }

        // Validca se está de acordo com o esperado
        $validator = Validator::make($request, [
            'file' => 'required|file|mimes:pdf,txt,doc|max:2048',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'errosValidate' => $validator->errors()
            ], 422);

        }
                        //Vai mover para o path public/uploads // Pega o nome do arquivo
        return $file->move(public_path('uploads'), $file->getClientOriginalName());
        
    }
}