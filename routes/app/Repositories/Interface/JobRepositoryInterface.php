<?php

namespace App\Repositories\Interface;

interface JobRepositoryInterface
{
    public function getAll();
    public function findByID(int $id);
    public function findByDepartment(int $id);
}
