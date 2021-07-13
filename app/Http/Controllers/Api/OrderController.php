<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
    public function index(Request $request)
    {
        $request->validate([
            'lat'=>'required|min:-90|max:90|numeric',
            'lng'=>'required|min:-180|max:180|numeric',
            'type'=>'sometimes|in:offer,request',
            'advertiser'=>'sometimes|in:owner,agent,marketer',
            'price_from'=>'sometimes|numeric',
            'price_to'=>'sometimes|numeric',
            'contract'=>'sometimes|in:buy,sell',
            'utilities'=>'sometimes|array',
            'is_special'=>'sometimes|boolean',
            'category_id'=>'sometimes|categories,id',
            'attributes'=>'sometimes|array',
            'attributes.*.id'=>'required|integer',
            'attributes.*.value'=>'required'
        ]);

        $orders=Order::query();
        $orders->when($request->type,function ($q){
            $q->where('type',\request('type'));
        });
        $orders->when($request->advertiser,function ($q){
            $q->where('advertiser',\request('advertiser'));
        });
        $orders->when($request->contract,function ($q){
            $q->where('contract',\request('contract'));
        });
        $orders->when($request->is_special,function ($q){
            $q->where('is_special',\request('is_special'));
        });
        $orders->when($request->category_id,function ($q){
            $q->where('category_id',\request('category_id'));
        });
        $orders->when($request->price_from and $request->price_to,function ($q){
            $q->whereBetween('price',[\request('price_from'),\request('price_to')]);
        });
        $orders->when($request->utilities,function ($q){
            $q->whereHas('utilities',function ($query){
                $query->whereIn('utilities.id',\request('utilities'));
            });
        });

        $orders->select('*')->selectRaw('( 6356 * acos( cos( radians(?) ) *
                           cos( radians( `lat` ) )
                           * cos( radians( `lng` ) - radians(?)
                           ) + sin( radians(?) ) *
                           sin( radians( `lat` ) ) )
                         ) AS distance', [request()->lat, request()->lng, request()->lat])
            ->havingRaw("20 >=  distance")->orderBy('distance');
        $orders->latest('updated_at')->limit(50)->with('user','neighborhood','attributes','utilities')->withCount('views');
        return \responder::success(OrderResource::collection($orders->get()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return \responder::success(new OrderResource($order));
    }


}
