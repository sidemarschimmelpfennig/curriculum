<?php

namespace App\Repositories\Interface;

interface BaseInterface
{
    public function getAll();
    public function create(array $data);
    public function delete(int $id);
    public function update(int $id, array $data);
    
}