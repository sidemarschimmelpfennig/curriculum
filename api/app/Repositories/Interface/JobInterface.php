<?php

namespace App\Repositories\Interface;

interface JobInterface extends BaseInterface
{
    public function updateStatus(int $id, int $newStatus);

}