<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Middleware\PreventRequestsDuringMaintenance;
use App\Http\Requests\Api\Advertisement\StoreRequest;
use App\Http\Requests\Api\Advertisement\UpdateRequest;
use App\Http\Resources\AdvertisementResource;
use App\Http\Resources\BaseCollection;
use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdvertisementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $advertisements=auth()->user()->advertisements()->latest()->paginate(10);
        return \responder::success(new BaseCollection($advertisements,AdvertisementResource::class));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        $user=auth()->user();
        $advertisement=$user->advertisements()->create($request->validated());
        if ($request->has('images')){
            foreach ($request['images'] as $image){
                $advertisement->addMedia($image)
                    ->toMediaCollection();
            }
        }

        return  \responder::success(__('advertisement added successfully !'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Advertisement $advertisement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Advertisement $advertisement)
    {
        $advertisement->update($request->validated());
        if ($request->has('images')){
            foreach ($request['images'] as $image){
                $advertisement->addMedia($image)
                    ->toMediaCollection();
            }
        }
        return  \responder::success(__('advertisement updated successfully !'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
