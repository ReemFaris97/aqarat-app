<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Order\DeleteRequest;
use App\Http\Requests\Api\Order\StoreRequest;
use App\Http\Requests\Api\Order\UpdateRequest;
use App\Http\Resources\BaseCollection;
use App\Http\Resources\OrderResource;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return \responder::success(new BaseCollection(auth()->user()->orders()->with('attributes')->paginate(10), OrderResource::class));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        $inputs = $request->validated();
        $inputs['user_id'] = auth()->id();
        $order = Order::create($inputs);

        if ($request->has('images')) $order->addMultipleMediaFromRequest(['images'])->each(function ($fileAdder) {
            $fileAdder->toMediaCollection();
        });
        if ($request->has('attributes')) $order->attributes()->sync($request->get('attributes'));
        if ($request->has('utilities')) $order->utilities()->sync($request->utilities);

        return \responder::success(new OrderResource($order));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateRequest $request, Order $order)
    {
        $order->update($request->validated());

        if ($request->has('images')) $order->addMultipleMediaFromRequest(['images'])->each(function ($fileAdder) {
            $fileAdder->toMediaCollection();
        });
        if ($request->has('attributes')) $order->attributes()->sync($request->get('attributes'));
        if ($request->has('utilities')) $order->utilities()->sync($request->utilities);

        return \responder::success(new OrderResource($order));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(DeleteRequest $request, Order $order)
    {
        $order->delete();
        return \responder::success(__('deleted successfully !'));
    }
}
