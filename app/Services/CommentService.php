<?php

namespace App\Services;

use App\Repositories\CommentRepository;

class CommentService
{
    protected $repository;

    public function __construct(CommentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $attributes, string $commentable_type, int $user_id)
    {
        $attributes += [
            'commentable_type' => $commentable_type,
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
