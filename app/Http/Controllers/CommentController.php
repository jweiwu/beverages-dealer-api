<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Services\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function index(Request $request, int $commentable_id)
    {
        $comments = $this->commentService->getByType($commentable_id, $request->path());
        return response()->json($comments);
    }

    public function store(CommentRequest $request, int $commentable_id)
    {
        $instance = [
            'comments' => $request->input('comments'),
            'commentable_id' => $commentable_id,
        ];
        $comment = $this->commentService->create($instance, $request->path());
        return response()->json($comment, 201);
    }

    public function show(int $commentable_id, int $id)
    {
        $comment = $this->commentService->getById($id);
        return response()->json($comment);
    }

    public function update(CommentRequest $request, int $commentable_id, int $id)
    {
        $commentString = $request->input('comments');
        $item = $this->commentService->update($commentString, $id);
        return response()->noContent();
    }

    public function destroy(int $commentable_id, int $id)
    {
        $this->commentService->delete($id);
        return response()->noContent();
    }
}
