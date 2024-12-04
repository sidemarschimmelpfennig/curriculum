<?php

namespace App\Services;

class CurriculumService
{
    private $curriculumRepository;

    public function __construct(CurriculumRepository $curriculumRepository)
    {
        $this->curriculumRepository = $curriculumRepository;
    }

    public function all()
    {
        return $this->curriculumRepository->all();
    }

    public function findById(int $id)
    {
        return $this->curriculumRepository->findById($id);
    }

    public function create(array $data)
    {
        return $this->curriculumRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->curriculumRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->curriculumRepository->delete($id);
    }

    public function send($fileData)
    {
        return $this->curriculumRepository->send($fileData);
    }
}