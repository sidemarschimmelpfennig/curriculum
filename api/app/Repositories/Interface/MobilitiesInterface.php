<?php

namespace App\Repositories\Interface;

use App\Repositories\Interface\BaseInterface;

interface MobilitiesInterface extends BaseInterface
{
    public function findByMobilities(int $id);
}