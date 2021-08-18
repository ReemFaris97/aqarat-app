<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Order\IndexRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {

        $orders=Order::query();
        $orders->withExists('isFavoured')->withCount('views');
        $orders->filter($request);
        return \responder::success(OrderResource::collection($orders->get()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Order $order)
    {
        $order->is_favoured_exists=$order->isFavoured()->exists();
        $order->views_count=$order->views()->count();
        return \responder::success(new OrderResource($order));
    }


}
