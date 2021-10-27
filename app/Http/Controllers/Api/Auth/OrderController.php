<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Order\DeleteRequest;
use App\Http\Requests\Api\Order\StoreRequest;
use App\Http\Requests\Api\Order\UpdateRequest;
use App\Http\Resources\BaseCollection;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\User;
use App\Notifications\SimilarOrderNotification;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return \responder::success(new BaseCollection(auth()->user()->orders()->withExists('isFavoured')->withCount('views')->when(request('type'),function ($q){
            $q->where('type',request('type'));
        })->with('attributes')->paginate(10), OrderResource::class));
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

        $order=Order::createWithAttributes($inputs);
        if (in_array($order->type, ['offer', 'request'])) {

            $users = User::whereHas('orders', function ($q) use ($order) {
                $type = $order->type == 'request' ? 'offer' : 'request';

                $q->where(['contract' => $order->contract, 'category_id' => $order->category_id, 'type' => $order->type == 'request' ? 'offer' : 'request'])
                    ->when($type == 'offer', function ($q) use ($order) {
                        $q->whereIn('neighborhood_id', $order->neighborhoods()->pluck('neighborhoods.id'));
                    })

                    ->when($type == 'request', function ($q) use ($order) {
                        $q->whereHas('neighborhoods', function ($q) use ($order) {
                            $q->where('neighborhoods.id', $order->neighborhood_id);
                        });
                    });
            })->where('users.id', '!=', $order->user_id)->get();
            info($users);
            \Notification::send($users, new SimilarOrderNotification($order));
        }
//        $order = Order::create($inputs);

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
        $order->update($request->validated()+['updated_at'=>now()]);

        if ($request->has('images')) $order->addMultipleMediaFromRequest(['images'])->each(function ($fileAdder) {
            $fileAdder->toMediaCollection();
        });
        if ($request->has('attributes')) $order->attributes()->sync($request->get('attributes'));
        if ($request->has('utilities')) $order->utilities()->sync($request->utilities);
        if ($request->has('neighborhoods')) $order->neighborhoods()->sync($request->neighborhoods);

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
