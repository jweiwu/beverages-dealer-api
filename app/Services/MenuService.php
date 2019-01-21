<?php

namespace App\Services;

use App\Entities\User;
use App\Repositories\MenuRepository;

class MenuService
{
    protected $repository;

    public function __construct(MenuRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $attributes)
    {
        return $this->repository->create($attributes + ['modifier_id' => auth()->user()->id]);
    }

    public function update(array $attributes, int $id)
    {
        return $this->repository->update($attributes + ['modifier_id' => auth()->user()->id], $id);
    }

    public function delete(int $id)
    {
        $this->repository->delete($id);
    }

    public function getById(int $id)
    {
        return $this->repository->find($id);
    }

    public function getAll()
    {
        return $this->repository->all();
    }

}
