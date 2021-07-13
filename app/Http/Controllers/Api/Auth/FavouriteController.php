<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdvertisementResource;
use App\Http\Resources\BaseCollection;
use App\Http\Resources\OrderResource;
use App\Models\Advertisement;
use App\Models\Favourite;
use App\Models\Order;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function advertisements()
    {
        return \responder::success(new BaseCollection(auth('api')->user()->favouriteAdvertisements()->paginate(10),
                                AdvertisementResource::class));
    }

    public function orders()
    {
        return \responder::success(new BaseCollection(auth('api')->user()->favouriteOrders()->paginate(10),
                                OrderResource::class));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'model_id' => 'required',
            'model_type' => 'required|in:Advertisement,Order',
        ]);
        $validator['model_type'] = "App\\Models\\$request->model_type";
        $validator['user_id'] = auth()->user()->id;

        $order = Order::whereId($validator['model_id'])->exists();
        $adv = Advertisement::whereId($validator['model_id'])->exists();

        if ($order || $adv){
            $fav = Favourite::whereModelId($validator['model_id'])->whereModelType($validator['model_type'])->whereUserId(auth('api')->user()->id);
            if ($fav->exists()) {
                $fav->delete();
            } else {
                Favourite::create($validator);
            }
        }else{
            return \responder::error('wrong model id');
        }


        return \responder::success('Success');
    }


}
