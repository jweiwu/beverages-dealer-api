<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuItemRequest;
use App\Http\Resources\MenuItem as MenuItemResource;
use App\Services\MenuItemService;

class MenuItemController extends Controller
{
    protected $menuItemService;

    public function __construct(MenuItemService $menuItemService)
    {
        $this->menuItemService = $menuItemService;
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
    }

    public function index(int $menu_id)
    {
        $items = $this->menuItemService->getByMenu($menu_id);
        // return MenuItemResource::collection($items);
        return response()->json($items);
    }

    public function store(MenuItemRequest $request, int $menu_id)
    {
        $instance = $request->only(['category', 'product', 'price', 'hot_drink', 'adjust_ice', 'adjust_sugar', 'remarks']);
        $item = $this->menuItemService->create($instance + ['menu_id' => $menu_id]);
        $resource = new MenuItemResource($item);
        return $resource->response()->setStatusCode(201);
    }

    public function show(int $menu_id, int $id)
    {
        $item = $this->menuItemService->getById($id);
        return new MenuItemResource($item);
    }

    public function update(MenuItemRequest $request, int $menu_id, int $id)
    {
        $instance = $request->only(['category', 'product', 'price', 'hot_drink', 'adjust_ice', 'adjust_sugar', 'remarks']);
        $item = $this->menuItemService->update($instance, $id);
        return response()->noContent();
    }

    public function destroy(int $menu_id, int $id)
    {
        $this->menuItemService->delete($id);
        return response()->noContent();
    }
}
