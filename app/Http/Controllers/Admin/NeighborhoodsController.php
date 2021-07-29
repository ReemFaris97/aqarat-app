<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NeighborhoodsRequest;
use App\Models\City;
use App\Models\Neighborhood;
use Illuminate\Http\Request;

class NeighborhoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=Neighborhood::all();
        return view('admin.neighborhoods.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::whereStatus(1)->get()->mapWithKeys(function ($item) {
            return [$item['id'] => $item['name']];
        });
        return view('admin.neighborhoods.add',compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NeighborhoodsRequest $request)
    {
        $data=$request->validated();
        Neighborhood::create($data);
        toastr()->success('تم اضافة الحى بنجاح');
        return redirect()->route('admin.neighborhoods.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Neighborhood $neighborhood)
    {
        $cities = City::whereStatus(1)->pluck('name','id');
        return view('admin.neighborhoods.edit',['item'=>$neighborhood,'cities'=>$cities]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NeighborhoodsRequest $request, Neighborhood $neighborhood)
    {
        $neighborhood->update($request->validated());
        toastr()->success('تم تعديل الحى بنجاح');
        return redirect()->route('admin.neighborhoods.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Neighborhood $neighborhood)
    {
        $neighborhood->delete();
        toastr()->success('تم حذف الحى بنجاح');
        return redirect()->back();
    }

    public function changeStatus($id)
    {
        $item = Neighborhood::find($id);
        $item->update(['status' => !$item->status]);
        toastr()->success('تم تغير الحالة بنجاح');
        return redirect()->back()->with('success', ' تم تعديل الحاله بنجاح');
    }
}
