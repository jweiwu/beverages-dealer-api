<?php

namespace App\Http\Controllers;

use App\Services\LikeService;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    protected $likeService;

    public function __construct(LikeService $likeService)
    {
        $this->likeService = $likeService;
    }

    public function store(Request $request, int $likeable_id)
    {
        $like = $this->likeService->create($likeable_id, $request->path());
        return response()->json($like, 201);
    }

    public function destroy(Request $request, int $likeable_id)
    {
        $this->likeService->delete($likeable_id, $request->path());
        return response()->noContent();
    }
}
