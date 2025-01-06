<?php

namespace App\Repositories\Eloquent;

use App\Models\Status;
use App\Repositories\Interface\StatusInterface;

class StatusRepository implements StatusInterface
{
    public function getAll()
    {
        return Status::all();

    }

    public function findByStatus(int $id)
    {
        return Status::find($id);

    }

    public function findID(int $id)
    {
        return Status::find($id);
        
    }


    public function update(int $id, array $data)
    {
        return Status::where('id', $id)->update($data);
    }

    public function delete(int $id)
    {
        return Status::where('id', $id)->update([
            'active' => false

        ]);
    }

    public function create(array $data)
    {
        return Status::create($data);
        
    }
}