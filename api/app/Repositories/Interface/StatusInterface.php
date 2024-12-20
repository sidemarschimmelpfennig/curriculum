<?php

namespace App\Repositories\Interface;

interface StatusInterface extends BaseInterface
{
    public function findByStatus(int $id);
    
}
