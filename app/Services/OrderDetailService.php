<?php

namespace App\Services;

use App\Entities\User;
use App\Repositories\OrderDetailRepository;

class OrderDetailService
{
    protected $repository;

    public function __construct(OrderDetailRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $attributes, User $user)
    {
        return $this->repository->create($attributes + ['user_id' => $user->id]);
    }

    public function update(array $attributes, int $id)
    {
        return $this->repository->update($attributes, $id);
    }

    public function delete(int $id)
    {
        $this->repository->delete($id);
    }

    public function getByOrder(int $order_id)
    {
        return $this->repository->findByField('order_id', $order_id);
    }
}
