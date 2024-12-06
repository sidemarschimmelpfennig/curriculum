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

    //public function send(object $file, array $request) {
    public function send(object $file) {
        /*$path = $file->move(public_path('uploads'), $file->getClientOriginalName());

        return $path;*/

        $directory = public_path('uploads');
        $name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        if(!is_dir($directory)){
            mkdir($directory, 0755, true);

        }

        $counter = 1;
        $newName = $name;
        while (file_exists("$directory/$newName.$extension")) {
            $newName = $name . '_' . $counter;
            $counter++;

        }
        $path = $file->move($directory, "$newName.$extension");
        return $path->getPathname();
    }

    public function create(array $data) {
        return $this->repository->create($data);
        
    }
}