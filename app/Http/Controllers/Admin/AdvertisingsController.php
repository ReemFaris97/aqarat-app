<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdvertisingRequest;
use App\Models\Advertising;
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
            $items=Advertising::all();
        return view('admin.advertisings.index',compact('items'));
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
    public function edit(Advertising $advertising)
    {
        return view('admin.advertisings.edit',['item'=>$advertising]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdvertisingRequest $request, Advertising $advertising)
    {
        $advertising->update($request->validated());
        toastr()->success('تم تعديل الإعلان بنجاح');
        return redirect()->route('admin.advertisings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertising $advertising)
    {
        $advertising->delete();
        toastr()->success('تم حذف الإعلان بنجاح');
        return redirect()->back();
    }

    public function changeStatus($id)
    {
        $item = Advertising::find($id);
        $status = $item->status == 1 ? 0 : 1;
        $item->status = $status;
        $item->save();
        toastr()->success('تم تغير الحالة بنجاح');
        return redirect()->back()->with('success', ' تم تعديل الحاله بنجاح');
    }
}
