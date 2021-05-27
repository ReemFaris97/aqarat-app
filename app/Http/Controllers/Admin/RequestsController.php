<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Requests;
use Illuminate\Http\Request;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=Requests::all();
        return view('admin.requests.index',compact('items'));
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
    public function edit(Requests $requests)
    {
        return view('admin.requests.edit',['item'=>$requests]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdvertisingRequest $request, Requests $requests)
    {
        $requests->update($request->validated());
        toastr()->success('تم تعديل الطلب بنجاح');
        return redirect()->route('admins.requests.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requests $requests)
    {
        $requests->delete();
        toastr()->success('تم حذف العرض بنجاح');
        return redirect()->back();
    }

    public function changeStatus($id)
    {
        $item = \App\Models\Request::find($id);
        $status = $item->status == 1 ? 0 : 1;
        $item->status = $status;
        $item->save();
        toastr()->success('تم تغير الحالة بنجاح');
        return redirect()->back()->with('success', ' تم تعديل الحاله بنجاح');
    }
}
