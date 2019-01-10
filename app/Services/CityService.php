<?php

namespace App\Services;

use App\Repositories\CityRepository;

class CityService
{
    protected $repository;

    public function __construct(CityRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->all();
    }

}
