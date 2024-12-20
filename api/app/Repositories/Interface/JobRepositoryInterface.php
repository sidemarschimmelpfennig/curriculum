<?php

namespace App\Repositories\Interface;

interface JobRepositoryInterface extends BaseInterface
{
    public function updateStatus(int $id, int $newStatus);

}