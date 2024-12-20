<?php

namespace App\Repositories\Eloquent;

use App\Models\Mobilities;
use App\Repositories\Interface\MobilitiesInterface;

class MobilitiesRepository implements MobilitiesInterface
{
    public function getAll()
    {
        return Mobilities::all();
    }

    public function findByMobilities(int $id)
    {
        return Mobilities::find($id);

    }

    public function create(array $data)
    {
        return Mobilities::create($data);

    }

    public function update(int $id, array $data)
    {
        return Mobilities::where('id', $id)->update($data);
    }

    public function delete(int $id)
    {
        return Mobilities::where('id', $id)->update([
            'active' => false
        ]);
        
    }

}