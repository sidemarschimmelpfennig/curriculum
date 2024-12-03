<?php

namespace App\Repositories\Interface;

interface UserRepositoryInterface extends BaseInterface
{
    public function findAdmin(int $param);
    public function create(array $data);

}