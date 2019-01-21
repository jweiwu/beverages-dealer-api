<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderDetailRequest;
use App\Http\Resources\OrderDetail as OrderDetailSource;
use App\Services\OrderDetailService;

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
        // return OrderDetailSource::collection($details);
        return response()->json($details);
    }

    public function store(OrderDetailRequest $request, int $order_id)
    {
        $instance = $request->only(['menu_item_id', 'amount', 'hot', 'ice', 'sugar', 'remarks']);
        $item = $this->orderDetailService->create($instance + ['order_id' => $order_id]);
        $resource = new OrderDetailSource($item);
        return $resource->response()->setStatusCode(201);
    }

    public function show(int $order_id, int $id)
    {
        $item = $this->orderDetailService->getById($id);
        return new OrderDetailSource($item);
    }

    public function update(OrderDetailRequest $request, int $order_id, int $id)
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
