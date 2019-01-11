<?php

namespace App\Services;

use App\Repositories\MenuItemRepository;

class MenuItemService
{
    protected $repository;

    public function __construct(MenuItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $attributes)
    {
        return $this->repository->create($attributes);
    }

    public function update(array $attributes, int $id)
    {
        return $this->repository->update($attributes, $id);
    }

    public function delete(int $id)
    {
        $this->repository->delete($id);
    }

    public function getByMenu(int $menu_id)
    {
        return $this->repository->with(['menu'])->findByField('menu_id', $menu_id);
    }
}
