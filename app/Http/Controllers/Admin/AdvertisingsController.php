<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdvertisingRequest;
use App\Models\Advertisement;
use App\Models\City;
use App\Models\Neighborhood;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class AdvertisingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Order::whereType('advertisement')->whereAdminReviewed(1)->get();
        return view('admin.advertisings.index', compact('items'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $advertising)
    {
        return  view('admin.advertisings.show',compact('advertising'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $advertising)
    {
        $users = User::get()->mapWithKeys(function ($q){
            return [$q['id']=>$q['name']];
        });
        $cities = City::get()->mapWithKeys(function ($q){
            return [$q['id']=>$q['name']];
        });
        $neighborhoods = Neighborhood::get()->mapWithKeys(function ($q){
            return [$q['id']=>$q['name']];
        });
        return view('admin.advertisings.edit',compact('advertising','users','cities','neighborhoods'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdvertisingRequest $request, Order $advertisement)
    {
        $advertisement->update($request->validated());
        toastr()->success('تم تعديل الإعلان بنجاح');
        return redirect()->route('admin.advertisings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=Order::findOrFail($id);
        $item->delete();
        toastr()->success('تم حذف الإعلان بنجاح');
        return redirect()->back();
    }

    public function changeStatus($id)
    {
        $item = Order::find($id);
        $item->update(['is_active' => !$item->is_active]);
        toastr()->success('تم تغير الحالة بنجاح');
        return redirect()->back()->with('success', ' تم تعديل الحاله بنجاح');
    }
}
