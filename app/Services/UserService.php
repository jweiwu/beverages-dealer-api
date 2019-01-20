<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $attributes)
    {
        return $this->repository->create([
            'email' => $attributes['email'],
            'name' => $attributes['name'],
            'password' => bcrypt($attributes['password']),
        ]);
    }
}
