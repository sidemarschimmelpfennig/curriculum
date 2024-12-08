<?php

namespace App\Services;
use App\Repositories\Eloquent\CurriculumRepository;
use Illuminate\Support\Facades\Hash;

class CurriculumService
{
    protected $repository;

    public function __construct(CurriculumRepository $repository){
        $this->repository = $repository;
    }

    public function send(object $file) {
        $directory = public_path('uploads'); // Vai pegar o diretório
        $name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME); //Pega apenas o nomne do arquivo <- PATHINFO_FILENAME Entrda: teste.pdf | saida = teste
        $extension = $file->getClientOriginalExtension(); // Mesmo de acima, porém para a extensão
        if(!is_dir($directory)){ 
            mkdir($directory, 0755, true);

        } // Se não haver esse diretório vai criar com permissões e tudo mais

        $counter = 1;
        $newName = $name;
        while (file_exists("$directory/$newName.$extension")) {
            $newName = $name . '_' . $counter;
                       // Nome _ 1 2 3 ...........
            $counter++;

        } // Enquanto o arquivo exister, no diretorio tal, vai colocar o nome como "nome"_+1 +2...
        $path = $file->move($directory, "$newName.$extension"); // Move o arquivo novo
        return $path->getPathname();
    }

    public function create(array $data) {
        return $this->repository->create([
            'full_name' => $data['full_name'],
            'cpf' => $data['cpf'],
            'address' => $data['address'],
            'district' => $data['district'],
            'uf' => $data['uf'],
            'city' => $data['city'],
            'cep' => $data['cep'],
            'phone' => $data['phone'],
            'date_of_birth' => $data['date_of_birth'],
            'gender' => $data['gender'],
            'nationality' => $data['nationality'],
            'linkedin_url' => $data['linkedin_url'],
            'target_sectors' => $data['target_sectors'],
            'target_position' => $data['target_position'],
            'target_outher' => $data['target_outher'],
            'course' => $data['course'],
            'institution' => $data['institution'],
            'education_start_date' => $data['education_start_date'],
            'education_end_date' => $data['education_end_date'],
            'education_level' => $data['education_level'],
            'company' => $data['company'],
            'job_description' => $data['job_description'],
            'enterprise' => $data['enterprise'],
            'position' => $data['position'],
            'experience_start_date' => $data['experience_start_date'],
            'experience_end_date' => $data['experience_end_date'],
            'additional_info' => $data['additional_info'],
            'skills' => $data['skills'],
            'languages' => $data['languages'],
            'salary_expectation' => $data['salary_expectation'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),

        ]);
        
    }
}