<?php

namespace App\Services;

use App\Repositories\LikeRepository;
use App\Traits\ServiceExtensions;

class LikeService
{
    use ServiceExtensions;
    protected $repository;

    public function __construct(LikeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(int $likeable_id, string $path)
    {
        $attributes = [
            'likeable_id' => $likeable_id,
            'likeable_type' => $this->parsePath($path),
            'user_id' => auth()->user()->id,
        ];
        return $this->repository->create($attributes);
    }

    public function delete(int $likeable_id, string $path)
    {
        $attributes = [
            'likeable_id' => $likeable_id,
            'likeable_type' => $this->parsePath($path),
            'user_id' => auth()->user()->id,
        ];
        $this->repository->deleteWhere($attributes);
    }
}
