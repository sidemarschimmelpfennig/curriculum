<?php

namespace App\Repositories\Interface;

interface BaseInterface
{
    public function getAll();
    public function findByID(int $id);

}