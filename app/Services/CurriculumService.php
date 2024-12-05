<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;


use App\Repositories\Eloquent\CurriculumRepository;

class CurriculumService
{

    protected $repository;

    public function __construct(CurriculumRepository $repository){
        $this->repository = $repository;
    }

    public function send(object $file, array $request) {
        if (!$file->isValid()) {
            return [
                'error' => 'O arquivo não foi enviado corretamente.'

            ];

        }

        // Valida se está de acordo com o esperado
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

    public function create(array $data) {
        return $this->repository->create($data);
        
    }
}