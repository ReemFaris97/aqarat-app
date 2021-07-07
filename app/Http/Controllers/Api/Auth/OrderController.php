<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Order\StoreRequest;
use App\Http\Resources\BaseCollection;
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
    public function index()
    {
        return  \responder::success(new BaseCollection(auth()->user()->orders()->with('attributes')->paginate(10),OrderResource::class));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $inputs = $request->validated();
        $inputs['user_id'] = auth()->id();
        $order = Order::create($inputs);
        if ($request->has('images'))
        $order->addMultipleMediaFromRequest(['images'])->each(function ($fileAdder) {
            $fileAdder->toMediaCollection();
        });;
        if ($request->has('attributes'))
            $order->attributes()->attach($request->get('attributes'));

        if ($request->has('utilities'))
            $order->utilities()->attach($request->utilities);

        return \responder::success(__('success'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
