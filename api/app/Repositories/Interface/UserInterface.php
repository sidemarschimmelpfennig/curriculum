<?php

namespace App\Repositories\Interface;

interface UserInterface extends BaseInterface
{
    public function findByEmail(string $param);
    
}