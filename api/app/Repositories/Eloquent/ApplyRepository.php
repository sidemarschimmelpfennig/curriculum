<?php
namespace App\Repositories\Eloquent;

use App\Models\{
    Candidates

};

class ApplyRepository
{
    public function findCandidate(int $id)
    {
        return Candidates::find($id);

    }

    public function archiveFile(int $id, object $file)
    {
        $directory = public_path('uploads'); // Vai pegar o diretório
        $extension = $file->getClientOriginalExtension();

        if(!is_dir($directory)){ 
            mkdir($directory, 0755, true);

        }

        $candidate = $this->findCandidate($id);
        $newName = "$candidate->id" . "_" . "$candidate->full_name" . ".$extension";

        while (file_exists("$directory/$newName")) {
            //.$newName
            $newName = 'Candidato ' . $candidate->full_name . ', já cadastrado' . "." . $extension; // Adiciona o contador ao nome do arquivo

        }
    
        // Move o arquivo para o diretório com o novo nome
        //$path = $file->move($directory, $candidate->id . "_" . $candidate->full_name . "." . $extension); // Qualquer coisa só voltar para a lógica antiga
        $path = $file->move($directory, $newName);
    
        return $path; // Retorna o caminho do arquivo
    }
}