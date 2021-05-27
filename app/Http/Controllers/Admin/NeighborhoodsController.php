<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NeighborhoodsRequest;
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
        return view('admin.neighborhoods.add');
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
        return view('admin.neighborhoods.edit',['item'=>$neighborhood]);
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
        $status = $item->status == 1 ? 0 : 1;
        $item->status = $status;
        $item->save();
        toastr()->success('تم تغير الحالة بنجاح');
        return redirect()->back()->with('success', ' تم تعديل الحاله بنجاح');
    }
}
