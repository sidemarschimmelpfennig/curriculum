<?php

namespace App\Repositories\Interface;

interface AdminRepositoryInterface extends BaseInterface
{
    public function findAdmin(int $param);
    public function create(array $data);

}