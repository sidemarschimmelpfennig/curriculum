<?php

namespace App\Services;

use App\Repositories\Eloquent\SettingsRepository;

class SettingsService
{
    protected $repository;

    public function __construct(SettingsRepository $repository)
    {
        $this->repository = $repository;

    }

    public function update(array $data)
    {
        return $this->repository->update($data);
        
    }

}