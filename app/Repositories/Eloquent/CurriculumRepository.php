<?php

namespace App\Repositories\Eloquent;

class CurriculumRepository
{
    public function all()
    {
        return Curriculum::all();
    }

    public function findById(int $id)
    {
        return Curriculum::find($id);
    }

    public function create(array $data)
    {
        return Curriculum::create($data);
    }

    public function update(int $id, array $data)
    {
        $curriculum = Curriculum::find($id);

        if ($curriculum) {
            $curriculum->update($data);
            return $curriculum;
        }

        return null;
    }

    public function delete(int $id)
    {
        $curriculum = Curriculum::find($id);

        if ($curriculum) {
            return $curriculum->delete();
        }

        return false;
    }

    public function send(array $fileData)
    {

    }
}