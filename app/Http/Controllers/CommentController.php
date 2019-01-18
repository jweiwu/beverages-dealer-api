<?php

namespace App\Http\Controllers;

use App\Services\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function store(Request $request, int $commentable_id)
    {
        $instance = $request->only(['comments']);
        $comment = $this->commentService->create($instance + ['commentable_id' => $commentable_id], $request->path(), auth()->user()->id);
        return response()->json($comment, 201);
    }

    public function update(Request $request, int $commentable_id, int $id)
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
