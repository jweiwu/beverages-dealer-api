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

    public function create(array $attributes, string $path)
    {
        $attributes += [
            'commentable_type' => $this->parsePath($path),
            'user_id' => auth()->user()->id,
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

    public function getById(int $id)
    {
        return $this->repository->find($id);
    }

    public function getByType(int $id, string $path)
    {
        return $this->repository->findWhere([
            'commentable_id' => $id,
            'commentable_type' => $this->parsePath($path),
        ]);
    }

}
