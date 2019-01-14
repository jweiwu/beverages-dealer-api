<?php

namespace App\Http\Controllers;

use App\Services\CommentService;
use Illuminate\Http\Request;

class MenuCommentController extends Controller
{
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function store(Request $request, int $menu_id)
    {
        $instance = $request->only(['comments', 'commentable_id']);
        $comment = $this->commentService->create($instance, 'App\Entities\Menu', auth()->user()->id);
        // $resource = new MenuItemResource($item);
        return response()->json($comment, 201);
    }

    public function update(Request $request, int $menu_id, int $id)
    {
        $commentString = $request->input('comments');
        $item = $this->commentService->update($commentString, $id);
        return response()->noContent();
    }

    public function destroy(int $menu_id, int $id)
    {
        $this->commentService->delete($id);
        return response()->noContent();
    }
}
