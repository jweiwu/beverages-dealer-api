<?php

namespace App\Services;

use App\Repositories\CommentRepository;
use App\Traits\ServiceExtensions;

class CommentService
{
    use ServiceExtensions;
    protected $repository;

    public function __construct(CommentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $attributes, string $path, int $user_id)
    {
        $attributes += [
            'commentable_type' => $this->parsePath($path),
            'user_id' => $user_id,
        ];
        return $this->repository->create($attributes);
    }

    public function update(string $comments, int $id)
    {
        return $this->repository->update(['comments' => $comments], $id);
    }

    public function delete(int $id)
    {
        $this->repository->delete($id);
    }

}
