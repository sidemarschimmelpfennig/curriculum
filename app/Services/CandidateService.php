<?php

namespace App\Services;
use App\Repositories\Eloquent\CandidateRepository;
use Illuminate\Support\Facades\Auth;
class CandidateService
{
    protected $repository;

    public function __construct(CandidateRepository $repository){
        $this->repository = $repository;
    }

    public function send(object $file) 
    {
        $user = Auth::user();
   
        $directory = public_path('uploads'); // Vai pegar o diretório
        $name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME); //Pega apenas o nomne do arquivo <- PATHINFO_FILENAME Entrda: teste.pdf | saida = teste
        $extension = $file->getClientOriginalExtension(); // Mesmo de acima, porém para a extensão
        if(!is_dir($directory)){ 
            mkdir($directory, 0755, true);

        } // Se não haver esse diretório vai criar com permissões e tudo mais

        $counter = 1;
        $newName = $name; 
        //$newName = $user->name;
        while (file_exists("$directory/$newName.$extension")) {
            $newName = $name . '_' . $counter;// Nome _ 1 2 3 ...........
                       
            $counter++;

        } // Enquanto o arquivo exister, no diretorio tal, vai colocar o nome como "nome"_+1 +2...
        $path = $file->move($directory, "$newName.$extension"); // Move o arquivo novo
        return $path->getPathname();
    }

    public function create(array $data) 
    {
        $filePath = $this->send($data['file']);
        return $this->repository->create([
            'full_name' => $data['full_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'additional_info' => $data['additional_info'],
            'skills' => $data['skills'],
            'file' => $filePath,

        ]);
        
    }
}