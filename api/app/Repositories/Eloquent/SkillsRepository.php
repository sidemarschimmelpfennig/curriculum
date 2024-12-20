<?php

namespace App\Repositories\Eloquent;

use App\Models\Skills;
use App\Repositories\Interface\SkillsInteface;

class SkillsRepository implements SkillsInteface
{
    public function getAll()
    {
        return Skills::all();
    }
    
    public function findBySkill(int $id)
    {
        return Skills::find($id);
    }

    public function findID(int $id)
    {
        
    }


    public function create(array $data)
    {
        return Skills::create($data);
    }

    public function update(int $id, array $data)
    {
        return Skills::where('id', $id)->update($data);
    }

    public function delete(int $id)
    {
        return Skills::where('id', $id)->update([
            'active' => false
        ]);
    }
    
}