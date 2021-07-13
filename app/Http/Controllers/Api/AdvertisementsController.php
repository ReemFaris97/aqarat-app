<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdvertisementResource;
use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdvertisementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->validate([
            'lat'=>'required|min:-90|max:90|numeric',
            'lng'=>'required|min:-180|max:180|numeric',
        ]);
        $advertisements=Advertisement::query();
        $advertisements->select('*')->selectRaw('( 6356 * acos( cos( radians(?) ) *
                           cos( radians( `lat` ) )
                           * cos( radians( `lng` ) - radians(?)
                           ) + sin( radians(?) ) *
                           sin( radians( `lat` ) ) )
                         ) AS distance', [request()->lat, request()->lng, request()->lat])
            ->havingRaw("20 >=  distance")->orderBy('distance');
        $advertisements->latest('updated_at')->limit(50)->with('user','neighborhood')->withCount('views');

        return \responder::success(AdvertisementResource::collection($advertisements->get()));
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Advertisement $advertisement)
    {
        return  \responder::success(new AdvertisementResource($advertisement));
    }


}
