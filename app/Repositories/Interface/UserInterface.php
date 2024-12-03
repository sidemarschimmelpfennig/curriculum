<?php

namespace App\Repositories\Interface;

interface UserInterface extends BaseInterface
{
    public function findAdmin(int $param);
    public function create(array $data);

}