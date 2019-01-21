<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuRequest;
use App\Http\Resources\Menu as MenuResource;
use App\Services\MenuService;
use Symfony\Component\HttpFoundation\Response;

class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = $this->menuService->getAll();
        // return MenuResource::collection($menus);
        return response()->json($menus);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuRequest $request)
    {
        $instance = $request->only(['name', 'city_id', 'address', 'phone_number', 'description', 'condition', 'remarks']);
        $menu = $this->menuService->create($instance);
        $resource = new MenuResource($menu);
        return $resource->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $menu = $this->menuService->getById($id);
        return new MenuResource($menu);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MenuRequest $request, int $id)
    {
        $instance = $request->only(['name', 'city_id', 'address', 'phone_number', 'description', 'condition', 'remarks']);
        $menu = $this->menuService->update($instance, $id);
        return response()->noContent();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $this->menuService->delete($id);
        return response()->noContent();
    }
}
