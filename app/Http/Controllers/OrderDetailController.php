<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderDetail as OrderDetailSource;
use App\Services\OrderDetailService;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    protected $orderDetailService;

    public function __construct(OrderDetailService $orderDetailService)
    {
        $this->orderDetailService = $orderDetailService;
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
    }

    public function index(int $order_id)
    {
        $details = $this->orderDetailService->getByOrder($order_id);
        return OrderDetailSource::collection($details);
    }

    public function store(Request $request, int $order_id)
    {
        $instance = $request->only(['order_id', 'menu_item_id', 'amount', 'hot', 'ice', 'sugar', 'remarks']);
        $item = $this->orderDetailService->create($instance, auth()->user());
        $resource = new OrderDetailSource($item);
        return $resource->response()->setStatusCode(201);
    }

    public function update(Request $request, int $order_id, int $id)
    {
        $instance = $request->only(['menu_item_id', 'amount', 'hot', 'ice', 'sugar', 'remarks']);
        $item = $this->orderDetailService->update($instance, $id);
        return response()->noContent();
    }

    public function destroy(int $order_id, int $id)
    {
        $this->orderDetailService->delete($id);
        return response()->noContent();
    }
}
